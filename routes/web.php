<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\menuController;

Route::get('/', function () { return view('welcome');});

Route::get('/menu', [menuController::class, 'index'])->name('menu');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
