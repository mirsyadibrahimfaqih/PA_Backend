@extends('adminlte::page')
@section('title', 'Detail Buku')
@section('content_header')
    <h1>Detail tamu</h1>
@stop
@section('content')
@foreach($tamu as $b)
    <div class="media">
        <div class="media-body"> 
            <p>
                Nama tamu : {{ $b->nama }} <br/>
                Gender tamu : {{ $b->gender }} <br/>
                No_hp tamu : {{ $b->no_hp }} <br/>
                Alamat tamu : {{ $b->alamat }} <br/>
            </p>
            <hr/>
            <a href="{{ url('/tamu') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endforeach
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop
