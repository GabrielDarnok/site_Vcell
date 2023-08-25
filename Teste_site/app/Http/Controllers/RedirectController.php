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
            return view('checkout',['ProductsAsCarrinho'=>$ProductsAsCarrinho, 'subtotal'=>$subtotal, 'user' => $user]);
        }
        return view('checkout', ['user' => $user]);
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
            return view('trace',['ProductsAsCarrinho'=>$ProductsAsCarrinho, 'subtotal'=>$subtotal, 'user' => $user]);
        }
        return view('trace', ['user' => $user]);
    }

    #Retornando a pagina Cadastrar ao usuario
    public function cadastrar(){
        $user = auth()->user();
        
        if (!isset($user->role) || $user->role == 'user') {
            return redirect('/');
        }
        $subtotal = 0;
        if ($user) {
            $ProductsAsCarrinho = $user->ProductsAsCarrinho;
            foreach ($ProductsAsCarrinho as $product) {
                $subtotal += $product->pivot->quantidade_produto * $product->valor;
            }
            return view('produto.cadastrar',['ProductsAsCarrinho'=>$ProductsAsCarrinho, 'subtotal'=>$subtotal, 'user' => $user]);
        }
        return view('produto.cadastrar',['user' => $user]);
    }
}
