<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function product (){

        #$busca = request('search');
        #2['busca' => $busca]
        $Product = Products::all();

        return view('product', ['Product'=>$Product]);
    }
}
