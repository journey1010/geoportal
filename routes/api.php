<?php

use App\Enums\TokenAbility;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticuloController;

Route::prefix('/v1/')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->middleware('throttle:login');
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::post('refresh-token', [AuthController::class, 'refreshTokens'])->middleware('auth:sanctum', 'abilities:refresh-access-token');
    // Ruta para guardar artículos
    Route::post('articulos', [ArticuloController::class, 'store']);

    Route::put('articulos/{id}/revisar', [ArticuloController::class, 'revisar']);
    //->middleware('auth:sanctum');
});
