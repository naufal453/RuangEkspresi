@extends('layouts.layout')

@section('title')
    Login
@endsection


@section('content')
    <h1>Ini Landing Page</h1>
    <a class="btn btn-warning" href="/account/create" role="button">Register</a>
    <a class="btn btn-warning" href="/account/login" role="button">Login</a>
    <a class="btn btn-warning" href="/event/create" role="button">Create Event</a>

@endsection
