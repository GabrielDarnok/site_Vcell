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
use App\Http\Controllers\UserController;
use App\Models\Products;
use Illuminate\Support\Facades\Redirect;

Route::get('/produto/create',[RedirectController::class, 'create']);

Route::get('/produto/{id}',[ProductController::class, 'show_products']);

Route::get('/',[ProductController::class, 'index']);

Route::get('/loja/store_product',[ProductController::class, 'store_product']);

Route::get('/busca/busca_product', [ProductController::class, 'busca_product'])->name('busca.busca_product');

Route::get('/checkout',[RedirectController::class, 'checkout']);

Route::get('/trace',[RedirectController::class, 'trace']);

Route::get('/cadastrar_produto',[RedirectController::class, 'cadastrar'])->middleware('auth');

Route::post('/index', [ProductController::class, 'store']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/');
    })->name('index');
});

Route::middleware('auth')->get('/user/{id}', [UserController::class, 'show_user']);

Route::middleware('auth')->get('/produto_lista', [ProductController::class, 'list']);

Route::delete('/produto_lista/{id}',[ProductController::class, 'destroy']);

Route::get('/produto_lista/edit/{id}',[ProductController::class, 'edit']);

Route::put('/produto_lista/update/{id}', [ProductController::class, 'update']);