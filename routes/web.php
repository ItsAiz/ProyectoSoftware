<?php

use App\Http\Controllers\startController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\menuController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [startController::class, 'index'])->name('start');
Route::get('/menu', [menuController::class, 'index'])->name('menu');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
