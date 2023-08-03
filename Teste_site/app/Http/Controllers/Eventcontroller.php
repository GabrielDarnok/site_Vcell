<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Products;

class Eventcontroller extends Controller
{
    public function index2 () {

        $Product = Products::all();

        return view('welcome', ['Product' => $Product]);
    }

    public function create(){
        return view('events.create');
    }

    public function products (){
        $busca = request('search');
        return view('products', ['busca' => $busca]);
    }

    public function index (){

        return view('index');
    }

    public function product (){

        return view('product');
    }

    public function store (){

        return view('store');
    }

    public function checkout (){

        return view('checkout');
    }

    public function trace (){

        return view('trace');
    }
}
