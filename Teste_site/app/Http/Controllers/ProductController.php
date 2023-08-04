<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Products;
use PhpParser\Node\Stmt\Return_;

class ProductController extends Controller
{
    public function product (){

        $busca = request('search');
        $Product = Products::all();

        return view('product', ['Product'=>$Product],['busca' => $busca]);
    }

    public function store_product(){

        $Product = Products::all();

        return view('store_product', ['Product'=>$Product]);
    }
}
