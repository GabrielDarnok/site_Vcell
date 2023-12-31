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
        $subtotal = 0;
        $Product = Products::all();
        $Product_date = Products::orderBy('created_at', 'desc')->get();

        if ($user) {
            $ProductsAsCarrinho = $user->ProductsAsCarrinho;
            foreach ($ProductsAsCarrinho as $product) {
                $subtotal += $product->pivot->quantidade_produto * $product->valor;
            }
            return view('index',['Product'=>$Product, 'Product_date'=>$Product_date, 'ProductsAsCarrinho'=>$ProductsAsCarrinho, 'subtotal'=>$subtotal, 'user' => $user]);
        }

        return view('index',['Product'=>$Product, 'Product_date'=>$Product_date,'user' => $user]);
    }
    
    #Fazendo a busca para verificar os produtos disponiveis
    public function store_product(){
        $Product = Products::all();
        $subtotal= 0;
        $user = auth()->user();
        if ($user) {
            $ProductsAsCarrinho = $user->ProductsAsCarrinho;
            foreach ($ProductsAsCarrinho as $product) {
                $subtotal += $product->pivot->quantidade_produto * $product->valor;
            }
            return view('loja.store_product',['ProductsAsCarrinho'=>$ProductsAsCarrinho, 'subtotal'=>$subtotal, 'Product'=>$Product,'user' => $user]);
        }

        return view('loja.store_product', ['Product'=>$Product,'user' => $user]);
    }

    #Fazendo a busca do produto quando digitado na URL ou no input de busca
    public function busca_product(){
        $subtotal = 0;
        $user = auth()->user();
        $busca = request('search');
        $message = 'Nenhum produto encontrado com os critérios de busca: ' . $busca;
        $Product_find = Products::where('nome_produto', 'LIKE', "%$busca%")->orWhere('categoria', 'LIKE', "%$busca%")->orderBy('valor')->get();
        $cheapestProduct = $Product_find->take(2);
        if ($user) {
            $ProductsAsCarrinho = $user->ProductsAsCarrinho;
            foreach ($ProductsAsCarrinho as $product) {
                $subtotal += $product->pivot->quantidade_produto * $product->valor;
            }
        }
        if ($Product_find->isEmpty() || empty($busca)) {
            return view('busca.busca_product',['ProductsAsCarrinho'=>$ProductsAsCarrinho, 'subtotal'=>$subtotal, 'message' => $message, 'user' => $user, 'busca' =>  $busca]);
        }
        if (isset($ProductsAsCarrinho)) {
            return view('busca.busca_product', ['cheapestProduct'=>$cheapestProduct, 'Product_find'=>$Product_find,'ProductsAsCarrinho'=>$ProductsAsCarrinho, 'subtotal'=>$subtotal, 'user' => $user, 'busca' =>  $busca]);
        } else {
            return view('busca.busca_product', ['cheapestProduct'=>$cheapestProduct, 'Product_find'=>$Product_find, 'user' => $user, 'busca' =>  $busca]);
        }
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
        $subtotal = 0;
        $Product = Products::findOrFail($id);
        $Product_list = Products::all();

        if ($user) {
            $ProductsAsCarrinho = $user->ProductsAsCarrinho;
            foreach ($ProductsAsCarrinho as $product) {
                $subtotal += $product->pivot->quantidade_produto * $product->valor;
            }
            return view('produto.product',['ProductsAsCarrinho'=>$ProductsAsCarrinho, 'subtotal'=>$subtotal, 'Product'=>$Product, 'Product_list'=>$Product_list, 'user' => $user]);
        }

        return view('produto.product', ['Product'=>$Product, 'Product_list'=>$Product_list, 'user' => $user]);
    }

    #Retornando a lista de produtos ao admin
    public function list(){
        $user = auth()->user();
        if(!isset($user->role) || $user->role == 'user'){
            return redirect('/');
        }
        $subtotal = 0;
        $Product = Products::all();

        if ($user) {
            $ProductsAsCarrinho = $user->ProductsAsCarrinho;
            foreach ($ProductsAsCarrinho as $product) {
                $subtotal += $product->pivot->quantidade_produto * $product->valor;
            }
            return view('produto.product_list',['ProductsAsCarrinho'=>$ProductsAsCarrinho, 'subtotal'=>$subtotal, 'Product'=>$Product, 'user' => $user]);
        }

        return view('produto.product_list',['Product'=>$Product, 'user' => $user]);
    }

    #Interação que adiciona itens no carrinho
    public function carrinho(){
        
        $Products = new Products;
        
        $user = auth()->user();
        $Products->user_id = $user->id;
    }

    #Deletando produto do bd
    public function destroy($id){
        $user = auth()->user();
        
        if(!isset($user->role) || $user->role == 'user'){
            return redirect('/');
        }
        $Product = Products::findOrFail($id)->delete();
        
        return redirect('/produto_lista')->with('msg',"Produto Removido com sucesso");
    }

    #Editando um produto cadastrado
    public function edit($id){
        $user = auth()->user();
        if(!isset($user->role) || $user->role == 'user'){
            return redirect('/');
        }
        $Product = Products::findOrFail($id);
        if ($user) {
            $ProductsAsCarrinho = $user->ProductsAsCarrinho;
            $subtotal = $ProductsAsCarrinho->sum(function ($produto) {
                return $produto->valor * $produto->quantidade;
            });
            return view('produto.edit',['ProductsAsCarrinho'=>$ProductsAsCarrinho, 'subtotal'=>$subtotal, 'Product'=>$Product, 'user' => $user]);
        }

        return view('produto.edit', ['Product'=>$Product, 'user' => $user]);
    }
    #Salvando a edição do produto
    public function update(Request $request){
        $user = auth()->user();
        if(!isset($user->role) || $user->role == 'user'){
            return redirect('/');
        }

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

    #Adicionando produto no carrinhho
    public function joinCarrinho(Request $request, $id) {
        
        $quantidade_produto = $request->input('quantidade_produto');

        $user = auth()->user();
    
        // Verificar se o produto já foi adicionado ao carrinho e caso for ele pega e soma a quantidade com a quantidade no bd
        if ($user->ProductsAsCarrinho()->where('products_id', $id)->exists()) {
            // Recuperar a relação pivot para o produto
            $pivotData = $user->ProductsAsCarrinho()->where('products_id', $id)->first()->pivot;

            // Calcular a nova quantidade somando a quantidade existente com a quantidade do banco de dados
            $novaQuantidade = $pivotData->quantidade_produto + $quantidade_produto;

            // Atualizar a relação pivot com a nova quantidade
            $user->ProductsAsCarrinho()->updateExistingPivot($id, ['quantidade_produto' => $novaQuantidade]);

            return redirect('/')->with('msg', 'Quantidade do produto no carrinho atualizada');
        }
    
        if ($quantidade_produto == null){
            $user->ProductsAsCarrinho()->attach($id);
        }else{
            $user->ProductsAsCarrinho()->attach($id, ['quantidade_produto' => $quantidade_produto]);
        }
    
        return redirect('/')->with('msg', 'Produto adicionado no carrinho');
    }

    #Adicionando produto no carrinhho
    public function joinCarrinho2(Request $request, $id) {
        
        $quantidade_produto = $request->input('quantidade_produto');

        $user = auth()->user();
        
        // Verificar se o produto já foi adicionado ao carrinho
        if ($user->ProductsAsCarrinho()->where('products_id', $id)->exists()) {
            // Recuperar a relação pivot para o produto
            $pivotData = $user->ProductsAsCarrinho()->where('products_id', $id)->first()->pivot;
        
            // Calcular a nova quantidade somando a quantidade existente com a quantidade do banco de dados
            $novaQuantidade = $pivotData->quantidade_produto + $quantidade_produto;
        
            // Atualizar a relação pivot com a nova quantidade
            $user->ProductsAsCarrinho()->updateExistingPivot($id, ['quantidade_produto' => $novaQuantidade]);
        
            return redirect('/loja/store_product')->with('msg', 'Quantidade do produto no carrinho atualizada');
        }
    
        if ($quantidade_produto == null){
            $user->ProductsAsCarrinho()->attach($id);
        }else{
            $user->ProductsAsCarrinho()->attach($id, ['quantidade_produto' => $quantidade_produto]);
        }
    
        return redirect('/loja/store_product')->with('msg', 'Produto adicionado no carrinho');
    }

    #Removendo produto do carrinho
    public function leaveCarrinho($id){
        $user = auth()->user();

        $Product = Products::findOrFail($id);

        $user->ProductsAsCarrinho()->detach($id);

        return redirect('/')->with('msg', 'Produto(s) removido do carrinho');
    }

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
}
