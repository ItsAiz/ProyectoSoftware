<?php

use App\Http\Controllers\WebController\BookingManagmentController;
use App\Http\Controllers\WebController\ClientManagmentController;
use App\Http\Controllers\WebController\DomicileManagmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController\WelcomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WebController\ClientController;
use App\Http\Controllers\WebController\HomeController;
use App\Http\Controllers\WebController\ProductController;
use App\Http\Controllers\WebController\EmployeeController;
use App\Http\Controllers\WebController\OrderController;

/* Rutas de la vista welcome */
Route::get('/', [welcomeController::class, 'getStart'])->name('start');
Route::get('/menu', [welcomeController::class, 'getMenu'])->name('menu');

/* Rutas de autorización, paquete basico de Laravel */
Auth::routes();

/* Rutas de registro y creación de clientes */
Route::post('/client/store', [ClientController::class, 'store'])->name('client/store');

/* Ruta de inicio modulos internos */
Route::get('/home', [HomeController::class, 'index'])->name('home');

/* Rutas de gestión de productos*/
Route::get('/product/management', [ProductController::class, 'index'])->name('product/management');
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product/store', [ProductController::class, 'store']);
Route::get('/product/edit/{product}', [ProductController::class, 'edit']);
Route::patch('/product/update/{product}', [ProductController::class, 'update']);
Route::delete('/product/destroy/{product}', [ProductController::class, 'destroy']);

/* Rutas gestión empleados*/
Route::get('/employee/management', [EmployeeController::class, 'index'])->name('employee/management');
Route::get('/employee/create', [EmployeeController::class, 'create']);
Route::post('/employee/store', [EmployeeController::class, 'store']);
Route::get('/employee/edit/{employee}', [EmployeeController::class, 'edit']);
Route::patch('/employee/update/{employee}', [EmployeeController::class, 'update']);
Route::delete('/employee/destroy/{employee}', [EmployeeController::class, 'destroy']);

/* Rutas gestión clientes*/
Route::get('/client/management', [ClientManagmentController::class,'index'])->name('client/management');
Route::get('/client/domicile/{client}', [ClientManagmentController::class,'domiciles']);
Route::get('/client/bookings/{client}', [ClientManagmentController::class,'bookings']);

/* Rutas gestión domicilios*/
Route::get('/domiciles/management', [DomicileManagmentController::class,'index'])->name('domiciles/management');

/* Rutas gestión reservas*/
Route::get('/bookings/management', [BookingManagmentController::class,'index'])->name('bookings/management');

// Rutas de solicitud de domicilios
Route::get('/makeOrder/{category}', [OrderController::class, 'getMakeOrder'])->name('makeOrder');
Route::get('/addProduct/{product}', [OrderController::class, 'addProduct']);
Route::delete('/removeProduct', [OrderController::class, 'removeProduct']);
Route::post('/finalizeOrder', [OrderController::class, 'finalizeOrder']);
