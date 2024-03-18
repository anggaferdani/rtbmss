<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CDRController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductRateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controller::class, 'login'])->name('login');
Route::get('/login', [Controller::class, 'login'])->name('login');
Route::post('/post-login', [Controller::class, 'postLogin'])->name('post-login');
Route::get('/logout', [Controller::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/cdr/{customerId}', [CDRController::class, 'index'])->name('cdr.index');
Route::get('/cdr/{customerId}/{ani}', [CDRController::class, 'detail'])->name('cdr.detail');
Route::get('/product-rate', [ProductRateController::class, 'index'])->name('product-rate.index');