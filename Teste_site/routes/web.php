<?php

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

use App\Http\Controllers\Eventcontroller;
use App\Http\Controllers\ProductController;

Route::get('/', [Eventcontroller::class, 'index2']);

Route::get('/events/create',[Eventcontroller::class, 'create']);

Route::get('/index',[Eventcontroller::class, 'index']);

Route::get('/product',[ProductController::class, 'product']);

Route::get('/products', [Eventcontroller::class, 'products']);

Route::get('/store',[Eventcontroller::class, 'store']);

Route::get('/checkout',[Eventcontroller::class, 'checkout']);

Route::get('/trace',[Eventcontroller::class, 'trace']);

Route::get('/cadastrar',[Eventcontroller::class, 'cadastrar']);
