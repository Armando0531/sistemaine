<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\NotificationController;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reportes', [ReporteController::class, 'showForm'])->name('reportes.form');
Route::get('/notifications', 'NotificationController@showNotifications')->name('notifications.show');


Route::resource('/unidades', App\Http\Controllers\UnidadeController::class);
Route::resource('/categorias', App\Http\Controllers\CategoriaController::class);
Route::resource('/productos', App\Http\Controllers\ProductoController::class);
Route::resource('/proveedore', App\Http\Controllers\ProveedoreController::class);
Route::resource('/areasadmin', App\Http\Controllers\AreasadminController::class);
Route::resource('/entrada', App\Http\Controllers\EntradaController::class);
Route::resource('/salida', App\Http\Controllers\SalidaController::class);
Route::resource('/salida', App\Http\Controllers\SalidaController::class);

Route::post('/reportes/generate', [ReporteController::class, 'generate'])->name('reportes.generate');

