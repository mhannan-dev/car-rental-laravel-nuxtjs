<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CarImage extends Model
{
    protected $fillable = ['car_id', 'image_path'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($image) {
            Storage::disk('public')->delete($image->image_path);
        });
    }
    public function getImagePathAttribute($value)
    {
        return asset("storage/$value");
    }
}
