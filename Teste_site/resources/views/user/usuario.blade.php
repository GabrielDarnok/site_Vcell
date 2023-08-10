@extends('layouts.main')

@section('title','trace')

@section('content')

    <div>
        <p>{{ $user->id }}</p>
        <p>{{ $user->name }}</p>
    </div>

@endsection