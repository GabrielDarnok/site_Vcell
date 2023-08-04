<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Products;

class RedirectController extends Controller
{
    public function index2 () {

        

        return view('welcome');
    }

    public function create(){
        return view('events.create');
    }

    public function index (){

        return view('index');
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

        return view('store_product');
    }

    public function store (Request $request){

        $Products = new Products;

        $Products->nome_produto = $request->nome_produto;
        $Products->categoria = $request->categoria;
        $Products->descricao = $request->descricao;
        $Products->valor = $request->valor;

        $Products->save();
        sleep(2);

        return view('/cadastrar');
    }
}
