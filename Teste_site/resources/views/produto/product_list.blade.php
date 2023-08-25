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
                        <td>R$ {{number_format($Products->valor,2, ',', '.')}}</td>
                        <td>
                            <a href="/produto_lista/edit/{{ $Products->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"> Editar </ion-icon></a> 
                            <form action="{{ route('product.destroy', ['product' => $Products]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"> <ion-icon name="trash-outline"> DELETAR </ion-icon></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Não existe nenhum registro de produto<P>
    @endif
</div>

@endsection