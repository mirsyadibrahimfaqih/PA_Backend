@extends('adminlte::page')
@section('title', 'Detail Buku')
@section('content_header')
    <h1>Detail Buku</h1>
@stop
@section('content')
@foreach($buku as $b)
    <div class="media">
        <div class="media-body"> 
            <p>
                Tanggal: {{ $b->tgl_bertamu }} <br/>
                Jabatan: {{ $b->jbtn }} <br/>
                Tamu: {{ $b->pen }} <br/>
                Keperluan: {{ $b->keperluan }}
            </p>
            <hr/>
            <a href="{{ url('/buku_tamu') }}" class="btn btn-primary">Back</a>
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
