<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/unidades', App\Http\Controllers\UnidadeController::class);
Route::resource('/categorias', App\Http\Controllers\CategoriaController::class);
Route::resource('/productos', App\Http\Controllers\ProductoController::class);
Route::resource('/proveedore', App\Http\Controllers\ProveedoreController::class);
Route::resource('/areasadmin', App\Http\Controllers\AreasadminController::class);
