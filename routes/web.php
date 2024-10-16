<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloServicioController;

Route::post('/articulos', [ArticuloServicioController::class, 'store'])->name('articulos.store');

Route::get('/', function () {
    return view('welcome');
});
