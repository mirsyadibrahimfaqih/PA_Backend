@extends('adminlte::page')
@section('title', 'Detail Buku')
@section('content_header')
    <h1>Detail Jabatan</h1>
@stop
@section('content')
@foreach($jabatan as $b)
    <div class="media">
        <div class="media-body"> 
            <p>
                Nama jabatan : {{ $b->nama }} <br/>
            </p>
            <hr/>
            <a href="{{ url('/jabatan') }}" class="btn btn-primary">Back</a>
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
