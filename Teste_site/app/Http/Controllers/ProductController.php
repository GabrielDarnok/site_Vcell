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
        
        $busca = strtoupper(request('search'));
        $Product = Products::all();

        return view('loja.store_product', ['Product'=>$Product], ['busca'=>$busca]);
    }

    public function store (Request $request){

        $Products = new Products;

        $Products->nome_produto = strtoupper($request->nome_produto);
        $Products->categoria = $request->categoria;
        $Products->descricao = $request->descricao;
        $Products->valor = $request->valor;

        if($request->hasFile('imagem_produto') && $request->file('imagem_produto')->isValid()){

            $requestImage = $request->imagem_produto;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        
            $request->imagem_produto->move(public_path('img/product'), $imageName);

            $Products->imagem_produto = $imageName;
        }

        $Products->save();

        return view('/index')->with('msg','Item adicionado!');
    }

    public function show($id){
        
        $Product = Products::findOrFail($id);
        $Product_list = Products::all();

        return view('produto.product2', ['Product'=>$Product], ['Product_list'=>$Product_list]);
    }
}
