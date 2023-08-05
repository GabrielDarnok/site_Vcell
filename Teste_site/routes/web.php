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

use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Redirect;

Route::get('/', [RedirectController::class, 'index2']);

Route::get('/events/create',[RedirectController::class, 'create']);

Route::get('/events/{id}',[ProductController::class, 'show']);

Route::get('/index',[RedirectController::class, 'index']);

Route::get('/product',[ProductController::class, 'product']);

Route::get('/store_product',[ProductController::class, 'store_product']);

Route::get('/checkout',[RedirectController::class, 'checkout']);

Route::get('/trace',[RedirectController::class, 'trace']);

Route::get('/cadastrar',[RedirectController::class, 'cadastrar']);

Route::post('/events', [ProductController::class, 'store']);