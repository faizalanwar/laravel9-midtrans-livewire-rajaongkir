<?php

use App\Http\Livewire\AddOngkir;
use App\Http\Livewire\AddProduct;
use App\Http\Livewire\Home;
use App\Http\Livewire\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/', [Home::class,'Home']);


Route::get('/', Home::class);
Route::get('/addproduct', AddProduct::class);
Route::get('/addongkir/{id}', AddOngkir::class);//cek id provinsi

Route::get('/cart', Cart::class);