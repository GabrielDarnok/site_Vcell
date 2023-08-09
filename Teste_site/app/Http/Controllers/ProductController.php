<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Products;
use PhpParser\Node\Stmt\Return_;

class ProductController extends Controller
{
    #Retornando os produtos para a pagina principal
    public function index (){
        
        $Product = Products::all();
        $Product_date = Products::orderBy('created_at', 'desc')->get();

        return view('index',['Product'=>$Product], ['Product_date'=>$Product_date]);
    }
    
    #Fazendo a busca para verificar os produtos disponiveis
    public function store_product(){
        
        $Product = Products::all();

        return view('loja.store_product', ['Product'=>$Product]);
    }

    #Fazendo a busca do produto quando digitado na URL ou no input de busca
    public function busca_product(){
        
        $busca = request('search');
        $Product_find = Products::where('nome_produto', 'LIKE', "%$busca%")->orWhere('categoria', 'LIKE', "%$busca%")->orderBy('valor')->get();
        $cheapestProduct = $Product_find->take(2);

        if ($Product_find->isEmpty() || empty($busca)) {
            $message = 'Nenhum produto encontrado com os critérios de busca: ' . $busca;
            return view('busca.busca_product', ['message' => $message]);
        }

        return view('busca.busca_product', ['cheapestProduct'=>$cheapestProduct], ['Product_find'=>$Product_find]);
    }
    
    #Cadastro de produtos
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

        return redirect('/');
    }

    #Fazendo a busca do produto quando selecionado
    public function show($id){
        
        $Product = Products::findOrFail($id);
        $Product_list = Products::all();

        return view('produto.product2', ['Product'=>$Product], ['Product_list'=>$Product_list]);
    }
}
