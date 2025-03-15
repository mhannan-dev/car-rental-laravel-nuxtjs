<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Make the 'image_path' column nullable in the 'car_images' table
        Schema::table('car_images', function (Blueprint $table) {
            $table->string('image_path')->nullable()->change();
        });

        Schema::table('cars', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('car_images', function (Blueprint $table) {
            $table->string('image_path')->nullable(false)->change();
        });

        Schema::table('cars', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(false)->change(); // Revert to non-nullable
        });
    }
};
