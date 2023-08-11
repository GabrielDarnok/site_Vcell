@extends('layouts.main')

@section('title','usuario')

@section('content')

    <div>
        <p>{{ $user->id }}</p>
        <p>{{ $user->name }}</p>
    </div>

@endsection