<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\User;

use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Gate;


class ProductController extends Controller
{
    #Retornando os produtos para a pagina principal index
    public function index (){
        
        $user = auth()->user();

        $Product = Products::all();
        $Product_date = Products::orderBy('created_at', 'desc')->get();

        if ($user) {
            $ProductsAsCarrinho = $user->ProductsAsCarrinho;
            $subtotal = $ProductsAsCarrinho->sum('valor');
            return view('index',['Product'=>$Product, 'Product_date'=>$Product_date, 'ProductsAsCarrinho'=>$ProductsAsCarrinho, 'subtotal'=>$subtotal]);
        }

        return view('index',['Product'=>$Product, 'Product_date'=>$Product_date]);
    }
    
    #Fazendo a busca para verificar os produtos disponiveis
    public function store_product(){
        $Product = Products::all();
        $user = auth()->user();
        if ($user) {
            $ProductsAsCarrinho = $user->ProductsAsCarrinho;
            $subtotal = $ProductsAsCarrinho->sum('valor');
            return view('loja.store_product',['ProductsAsCarrinho'=>$ProductsAsCarrinho, 'subtotal'=>$subtotal, 'Product'=>$Product]);
        }

        return view('loja.store_product', ['Product'=>$Product]);
    }

    #Fazendo a busca do produto quando digitado na URL ou no input de busca
    public function busca_product(){
        $user = auth()->user();
        $busca = request('search');
        $message = 'Nenhum produto encontrado com os critérios de busca: ' . $busca;
        $Product_find = Products::where('nome_produto', 'LIKE', "%$busca%")->orWhere('categoria', 'LIKE', "%$busca%")->orderBy('valor')->get();
        $cheapestProduct = $Product_find->take(2);

        if ($Product_find->isEmpty() || empty($busca)) {
            if ($user) {
                $ProductsAsCarrinho = $user->ProductsAsCarrinho;
                $subtotal = $ProductsAsCarrinho->sum('valor');
                return view('busca.busca_product',['ProductsAsCarrinho'=>$ProductsAsCarrinho, 'subtotal'=>$subtotal, 'message' => $message]);
            }
            return view('busca.busca_product', ['message' => $message]);
        }

        return view('busca.busca_product', ['cheapestProduct'=>$cheapestProduct, 'Product_find'=>$Product_find]);
    }
    
    #Cadastro de produtos
    public function store (Request $request){

        $Products = new Products;

        $Products->nome_produto = $request->nome_produto;
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
        
        $user = auth()->user();
        $Products->user_id = $user->id;

        $Products->save();

        return redirect('/')->with('msg',"Produto adicionado com sucesso");
    }

    #Fazendo a busca do produto quando selecionado
    public function show_products($id){
        $user = auth()->user();
        $Product = Products::findOrFail($id);
        $Product_list = Products::all();

        if ($user) {
            $ProductsAsCarrinho = $user->ProductsAsCarrinho;
            $subtotal = $ProductsAsCarrinho->sum('valor');
            return view('produto.product',['ProductsAsCarrinho'=>$ProductsAsCarrinho, 'subtotal'=>$subtotal, 'Product'=>$Product, 'Product_list'=>$Product_list]);
        }

        return view('produto.product', ['Product'=>$Product, 'Product_list'=>$Product_list]);
    }

    #Retornando a lista de produtos ao admin
    public function list(){
        $user = auth()->user();

        $Product = Products::all();

        if ($user) {
            $ProductsAsCarrinho = $user->ProductsAsCarrinho;
            $subtotal = $ProductsAsCarrinho->sum('valor');
            return view('produto.product_list',['ProductsAsCarrinho'=>$ProductsAsCarrinho, 'subtotal'=>$subtotal, 'Product'=>$Product]);
        }

        return view('produto.product_list',['Product'=>$Product]);
    }

    #Interação que adiciona itens no carrinho
    public function carrinho(){
        
        $Products = new Products;
        
        $user = auth()->user();
        $Products->user_id = $user->id;
    }

    #Deletando produto do bd
    public function destroy($id){
        
        $Product = Products::findOrFail($id)->delete();
        
        return redirect('/produto_lista')->with('msg',"Produto adicionado com sucesso");
    }

    #Editando um produto cadastrado
    public function edit($id){
        $user = auth()->user();

        $Product = Products::findOrFail($id);
        if ($user) {
            $ProductsAsCarrinho = $user->ProductsAsCarrinho;
            $subtotal = $ProductsAsCarrinho->sum('valor');
            return view('produto.edit',['ProductsAsCarrinho'=>$ProductsAsCarrinho, 'subtotal'=>$subtotal, 'Product'=>$Product]);
        }

        return view('produto.edit', ['Product'=>$Product]);
    }
    #Salvando a edição do produto
    public function update(Request $request){

        $dados = $request->all();

        if($request->hasFile('imagem_produto') && $request->file('imagem_produto')->isValid()){

            $requestImage = $request->imagem_produto;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        
            $request->imagem_produto->move(public_path('img/product'), $imageName);

            $dados['imagem_produto'] = $imageName;
        }

        Products::findOrFail($request->id)->update($dados);

        return redirect('/produto_lista')->with('msg',"Produto editado com sucesso");
    }

    #adicionando produto no carrinhho
    public function joinCarrinho($id) {
        $user = auth()->user();
    
        // Verificar se o produto já foi adicionado ao carrinho
        if ($user->ProductsAsCarrinho()->where('products_id', $id)->exists()) {
            return redirect('/')->with('msg', 'Erro! Produto já foi adicionado ao carrinho');
        }
    
        $user->ProductsAsCarrinho()->attach($id);
    
        return redirect('/')->with('msg', 'Produto adicionado no carrinho');
    }

    #Removendo produto do carrinho
    public function leaveCarrinho($id){
        $user = auth()->user();

        $Product = Products::findOrFail($id);

        $user->ProductsAsCarrinho()->detach($id);

        return redirect('/')->with('msg', 'Produto removido do carrinho');
    }
}
