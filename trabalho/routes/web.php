<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrarController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('categorias', CategoriaController::class)->middleware('auth');

Route::resource('produtos', ProdutoController::class)->middleware('auth');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/registrar', [RegistrarController::class, 'showRegister'])->name('register');
Route::post('/registrar', [RegistrarController::class, 'register']);