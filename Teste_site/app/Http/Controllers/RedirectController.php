<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Products;

class RedirectController extends Controller
{
    public function index () {
        return view('index');
    }

    public function create(){
        return view('produto.create');
    }
    
    public function checkout (){

        return view('checkout');
    }

    public function trace (){

        return view('trace');
    }

    public function cadastrar(){

        return view('cadastrar');
    }

    public function store_product(){

        return view('loja.store_product');
    }
}
