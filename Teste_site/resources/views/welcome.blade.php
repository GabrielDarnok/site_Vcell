@extends('layouts.main')

@section('title','trace')

@section('content')

@foreach ($Product as $Products)
    <p>{{ $Products->categoria }} -- {{ $Products->descricao }} -- {{$Products->valor}}</p>
@endforeach

@endsection