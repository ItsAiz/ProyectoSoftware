<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/ejemplo', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/prueba',[App\Http\Controllers\ClientController::class,'prueba']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
