<?php
use App\Http\Controllers\Catalogo;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/inicio', [Catalogo::class, 'inicio'])->middleware('auth')->name('home');

Route::get('/listado',[Catalogo::class,'listado'])->middleware('auth')->name('list');
Route::get('/agregar',[Catalogo::class,'agregar'])->middleware('auth')->name('agre'); 
Route::get('/editar/{id}',[Catalogo::class,'editar'])->middleware('auth')->name('edit');
Route::put('/edicion/{pelicula}',[Catalogo::class,'actualizar'])->name('actualizar');
Route::post('/insertar',[Catalogo::class,'insertar_pelicula'])->name('insertar');
Route::get('/eliminar/{id}', [Catalogo::class, 'eliminar_pelicula'])->name('eliminar');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/registro', [RegisterController::class, 'showRegisterForm'])->name('registro');
Route::post('/registro', [RegisterController::class, 'register']);
