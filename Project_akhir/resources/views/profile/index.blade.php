@extends('adminlte::page')

@section('title', 'Profil Pengguna')

@section('content_header')
    <h1>Profil Pengguna</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Detail Profil</h3>
                </div>
                <div class="card-body">
                    <p>Nama: {{ Auth::user()->name }}</p>
                    <p>Email: {{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </div>
@stop
