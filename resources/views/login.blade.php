@extends('layouts.layout')

@section('title')
    Login
@endsection


@section('content')
    <h1>Login</h1>
    <form method="POST" action="/login ">
        @csrf
        <label for="username">username</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        <button type="submit">Submit</button>
    </form>
@endsection
