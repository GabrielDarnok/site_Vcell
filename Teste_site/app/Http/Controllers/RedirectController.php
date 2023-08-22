<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Products;

class RedirectController extends Controller
{    
    #Retornando a pagina Checkout ao usuario
    public function checkout (){
        $user = auth()->user();
        $subtotal = 0;
        if ($user) {
            $ProductsAsCarrinho = $user->ProductsAsCarrinho;
            foreach ($ProductsAsCarrinho as $product) {
                $subtotal += $product->pivot->quantidade_produto * $product->valor;
            }
            return view('checkout',['ProductsAsCarrinho'=>$ProductsAsCarrinho, 'subtotal'=>$subtotal]);
        }
        return view('checkout');
    }

    #Retornando a pagina trace ao usuario
    public function trace (){
        $user = auth()->user();
        $subtotal = 0;
        if ($user) {
            $ProductsAsCarrinho = $user->ProductsAsCarrinho;
            foreach ($ProductsAsCarrinho as $product) {
                $subtotal += $product->pivot->quantidade_produto * $product->valor;
            }
            return view('trace',['ProductsAsCarrinho'=>$ProductsAsCarrinho, 'subtotal'=>$subtotal]);
        }
        return view('trace');
    }

    #Retornando a pagina Cadastrar ao usuario
    public function cadastrar(){
        $user = auth()->user();
        $subtotal = 0;
        if ($user) {
            $ProductsAsCarrinho = $user->ProductsAsCarrinho;
            foreach ($ProductsAsCarrinho as $product) {
                $subtotal += $product->pivot->quantidade_produto * $product->valor;
            }
            return view('produto.cadastrar',['ProductsAsCarrinho'=>$ProductsAsCarrinho, 'subtotal'=>$subtotal]);
        }
        return view('produto.cadastrar');
    }
}
