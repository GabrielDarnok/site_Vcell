@extends('layouts.main')

@section('title','product_list')

@section('content')

<div class="">
    <h1>PRODUTOS<h1>
</div>
<div class="">
    @if (count($Product) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Product as $Products)
                    <tr>
                        <td scope="row">{{$loop->index + 1}}</td>
                        <td><a href="/produto/{{ $Products->id }}">{{$Products->nome_produto}}</td>
                        <td>{{$Products->categoria}}</td>
                        <td>{{$Products->descricao}}</td>
                        <td>{{$Products->valor}}</td>
                        <td><a href="#"> Editar </a> <a href="#"> Deletar </a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Não existe nenhum registro de produto<P>
    @endif
</div>

@endsection