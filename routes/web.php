<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\webController\welcomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\webController\HomeController;

/* Rutas de la vista welcome */
Route::get('/', [welcomeController::class, 'getStart'])->name('start');
Route::get('/menu', [welcomeController::class, 'getMenu'])->name('menu');
Route::get('/makeOrder', [welcomeController::class, 'getMakeOrder'])->name('makeOrder');

/* Rutas de autorización, paquete basico de Laravel */
Auth::routes();

/* Rutas de gestión modulos internos */
Route::get('/home', [HomeController::class, 'index'])->name('home');
