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

Route::get('/produto/create',[RedirectController::class, 'create']);

Route::get('/produto/{id}',[ProductController::class, 'show']);

Route::get('/',[ProductController::class, 'index']);

Route::get('/loja/store_product',[ProductController::class, 'store_product']);

Route::get('/busca/busca_product', [ProductController::class, 'busca_product'])->name('busca.busca_product');

Route::get('/checkout',[RedirectController::class, 'checkout']);

Route::get('/trace',[RedirectController::class, 'trace']);

Route::get('/cadastrar_produto',[RedirectController::class, 'cadastrar']);

Route::post('/index', [ProductController::class, 'store']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
