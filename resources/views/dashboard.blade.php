@extends('layouts.layout')

@section('title')
    Login
@endsection

@section('content')
    @if (!session()->has('account'))
        @php
            header('Location: /account/login');
            exit;
        @endphp
    @else
        <h1>Ini dashboard</h1>
        <a class="btn btn-warning" href="/logout" role="button">Logout</a>
    @endif
@endsection
