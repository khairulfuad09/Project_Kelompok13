<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\pesananController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
//     return view('dashboard', [
//         // $user = (auth()->user()->email)
//     ]);
// });
Route::get('/', [DashboardController::class, 'index']);
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

Route::resource('/penjual', PenjualController::class);

Route::resource('/product', ProductController::class);

Route::resource('/user', UserController::class);
// Route::resource('/cart', ProductController::class);
Route::get('/cart/{id_product}', [ProductController::class, 'addCart']);
Route::get('/cart', [ProductController::class, 'cart']);

Route::resource('/order', cartController::class);

Route::resource('/pesanan', pesananController::class);


Route::resource('/produk', ProdukController::class);

Route::resource('/profile', ProfileController::class);
