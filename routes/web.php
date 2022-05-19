<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::post('/payment', [PaymentController::class, 'store'])->name('payment.create');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])->name('login.admin');
Route::get('/login/agent', [LoginController::class, 'showAgentLoginForm'])->name('login.agent');
Route::get('/register/admin', [RegisterController::class, 'showAdminRegisterForm'])->name('register.admin');
Route::get('/register/agent', [RegisterController::class, 'showAgentRegisterForm'])->name('register.agent');

Route::post('/login/admin', [LoginController::class, 'adminLogin']);
Route::post('/login/agent', [LoginController::class, 'agentLogin']);
Route::post('/register/admin', [RegisterController::class, 'createAdmin']);
Route::post('/register/agent', [RegisterController::class, 'createAgent']);

Route::view('/admin', 'home')->middleware('auth:admin');
Route::view('/agent', 'home')->middleware('auth:agent');

Route::get('/products', [ProductController::class, 'index'])->name('products.index')->middleware('auth:,admin,agent');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware('auth:admin,agent');
Route::post('/products/create', [ProductController::class, 'store'])->name('products.store')->middleware('auth:admin,agent');
