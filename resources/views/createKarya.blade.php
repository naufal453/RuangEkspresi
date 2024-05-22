@extends('layouts.layout')

@section('title')
    Register
@endsection


@section('content')
    <h1>Buat Karya</h1>
    <form method="POST" action="/karya">
        @csrf
        <label for="username">judulKarya</label>
        <input type="text" name="judulKarya" id="username">
        <br>
        <label for="username">tema</label>
        <input type="text" name="tema" id="username">
        <br>
        <label for="username">deskripsi</label>
        <input type="text" name="deskripsi" id="username">
        <br>
        <button type="submit">Buat</button>
    </form>
@endsection
