<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
// use App\Http\Middleware\AuthMiddleware;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'getHome'])->name('get_home');
Route::get('/products', [ProductsController::class, 'getProducts'])->name('get_products');
// Route::get('/products/{id}/detail', [ProductsController::class, 'getProductsDetail'])->name('get_products_detail');
Route::get('/products/{id}/detail', [ProductsController::class, 'getProductsDetail'])->name('get_products_detail')->middleware('authmiddleware');

Route::get('/register', [UserController::class, 'getRegister'])->name('get_register');
Route::post('/register-user', [UserController::class, 'registerUser'])->name('register_user');
Route::get('/login', [UserController::class, 'getLogin'])->name('get_login');
Route::post('/login', [UserController::class, 'loginUser'])->name('login_user');
Route::get('/login/google', [UserController::class, 'loginGoogle'])->name('login_google');
Route::get('/login/google/callback', [UserController::class, 'loginGoogleCallback'])->name('callback_google');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/dashboard', [UserController::class, 'dashboardUser'])->name('dashboard_user');
Route::get('/profile', [UserController::class, 'getProfile'])->name('get_profile');