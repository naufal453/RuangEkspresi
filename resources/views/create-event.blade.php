@extends('layouts.layout')

@section('title')
    Create Event
@endsection

@section('content')

    <h1>Create Event</h1>
    <form action="/event" method="POST">
            @csrf
            <label for="nama_event" class="form-label">Nama Event</label>
            <br>
            <input class="form-control form-control-sm" type="string" name="nama_event" id="nama_event" required aria-label=".form-control-sm">

            <div class="row form-group">
                <label for="tanggal_mulai" class="">Tanggal Mulai</label>
                <div class="col-sm-7">
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <label for="tanggal_selesai" class="">Tanggal Selesai</label>
                <div class="col-sm-7">
                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control">
                </div>
            </div>

            <label for="description" class="form-label">Description Event</label>
            <br>
            <textarea class="form-control" type="text" name="description_event" id="description" required rows="3"></textarea>

            <button type="submit">Create</button>
            <a href="/dashboard"> <button>Cancel</button> </a>
            
    </form>

    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>
@endsection
