@extends('layouts.app-master')


@section('content')
    @auth
    <h1 class="container">Home</h1>
        <p class="">Bienvenido {{ auth()->user()->username }}</p>
        <form action="{{ route('logout.perform') }}" method="POST">
            @csrf
            <button class="btn btn-primary" type="submit">Cerrar sesion</button>
        </form>
    @endauth

    @guest
        <p>Para ver el contenido necesitas iniciar sesion primeramente</p>
    @endguest
@endsection