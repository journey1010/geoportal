<?php

use App\Enums\TokenAbility;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticuloServicioController;

Route::prefix('/v1/')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->middleware('throttle:login');
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::post('refresh-token', [AuthController::class, 'refreshTokens'])->middleware('auth:sanctum', 'abilities:refresh-access-token');
});

Route::prefix('v1')->group(function () {
    Route::post('articulo', [ArticuloServicioController::class, 'store'])->middleware('auth:sanctum');
});
