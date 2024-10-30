<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloServicioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::post('/articulos', [ArticuloServicioController::class, 'store'])->middleware('auth:sanctum');
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('logout', [AuthController::class, 'logout']);

Route::middleware('auth:api')->group(function () {
    Route::post('users', [UserController::class, 'store']);
    Route::put('users/{id}', [UserController::class, 'update']);
});