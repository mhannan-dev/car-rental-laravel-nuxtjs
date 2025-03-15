<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::prefix('user')->group(function () {
        Route::post('login', [AuthController::class, 'login']);

        Route::middleware('auth:sanctum')->group(function () {
            Route::get('/', function (Request $request) {
                return $request->user();
            });
            Route::controller(AuthController::class)->prefix('auth')->group(function () {
                Route::post('logout', 'logout');
                Route::post('change-password', 'changePassword');
            });
        });
    });
});
