@extends('layouts.main')

@section('content')
    <h1>Olá, {{ Auth::user()->name }}!</h1>
    <p>Bem-vindo ao seu painel de controle.</p>

    <form action="{{ route('auth.destroy') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
@endsection
