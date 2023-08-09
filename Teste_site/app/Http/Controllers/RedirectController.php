<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Products;

class RedirectController extends Controller
{
    #Retornando a pagina Index ao usuario
    public function index () {
        return view('index');
    }
    
    #Retornando a pagina Checkout ao usuario
    public function checkout (){

        return view('checkout');
    }

    #Retornando a pagina trace ao usuario
    public function trace (){

        return view('trace');
    }

    #Retornando a pagina Cadastrar ao usuario
    public function cadastrar(){

        return view('produto.cadastrar');
    }

    #Retornando a pagina store_product ao usuario
    public function store_product(){

        return view('loja.store_product');
    }
}
