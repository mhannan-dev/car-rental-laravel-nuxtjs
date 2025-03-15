<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarResource\Pages;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;
    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->maxLength(255),

                // Brand Selection Dropdown
                Select::make('brand_id')
                    ->label('Brand')
                    ->relationship('brand', 'name')
                    ->searchable()
                    ->required(),

                // Category Selection Dropdown
                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->required(),

                TextInput::make('model')->required()->maxLength(255),
                TextInput::make('year')->required()->numeric()->minValue(1900)->maxValue(date('Y')),
                TextInput::make('license_plate')->required()->unique(ignoreRecord: true),

                Textarea::make('description')->nullable(),

                Repeater::make('images')
                    ->relationship('images')
                    ->schema([
                        FileUpload::make('image_path')
                            ->image()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                            ->disk('public') // Store in storage/app/public
                            ->directory('cars') // Saves inside storage/app/public/cars
                            ->maxSize(2048) // 2MB max file size
                            ->visibility('public') // Ensure file is publicly accessible
                            ->preserveFilenames()
                            ->nullable(), // Allow the image field to be nullable
                    ])
                    ->columns(1)
                    ->label('Car Images'),

                Select::make('status')
                    ->options([
                        'available' => 'Available',
                        'rented' => 'Rented',
                        'maintenance' => 'Maintenance',
                    ])
                    ->default('available')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                // Display multiple images from car_images table
                ImageColumn::make('images.image_path')
                    ->label('Images')
                    ->rounded()
                    ->limit(3), // Show up to 3 images in the table

                TextColumn::make('name')->sortable()->searchable(),

                // Display Brand & Category in Table
                TextColumn::make('brand.name')->label('Brand')->sortable()->searchable(),
                TextColumn::make('category.name')->label('Category')->sortable()->searchable(),

                TextColumn::make('model')->sortable()->searchable(),
                TextColumn::make('year')->sortable(),
                TextColumn::make('license_plate')->sortable(),
                TextColumn::make('price_per_day')->sortable(),
                TextColumn::make('price_per_km')->label('Price per KM')->sortable(),
                TextColumn::make('status')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'available' => 'Available',
                        'rented' => 'Rented',
                        'maintenance' => 'Maintenance',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }

    /**
     * Handle the afterSave logic to retain the previous image if no new image is uploaded.
     */
    public static function afterSave($record, array $data): void
    {
        // Check if an image is uploaded, if not, retain the existing image
        if (isset($data['images'][0]['image_path'])) {
            $image = $data['images'][0]['image_path'];

            if (!$image) {
                // If no new image is uploaded, use the old image path
                $image = $record->images->first()->image_path ?? null;
            }

            // Save or update the image path
            $record->images()->update(['image_path' => $image]);
        }

        parent::afterSave($record, $data);
    }
}
