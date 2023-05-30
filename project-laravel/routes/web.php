<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenjualController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/product', function () {
    return view('penjual.Product');
});
Route::get('/customer', function () {
    return view('penjual.customer');
});
Route::get('/sign', function () {
    return view('login');
})->middleware('guest');
Route::get('/sign2', function () {
    return view('login2');
})->middleware('guest');
Route::post('/login', [loginController::class, 'authenticate']);
Route::post('/register', [loginController::class, 'store']);
Route::post('/logout', [loginController::class, 'logout']);
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/penjual', [PenjualController::class, 'index']);
Route::resource('/penjual', PenjualController::class);
Route::resource('/user', UserController::class);
