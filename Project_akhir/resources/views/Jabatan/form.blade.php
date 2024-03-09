@extends('adminlte::page')

@section('title', 'Form Buku')

@section('content_header')
    <h1>Data Jabatan</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('jabatan.store') }}">
        @csrf 
        @if(isset($jabatan))
            @method('PUT')
        @endif
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ isset($jabatan) ? $jabatan->nama : old('nama') }}"/>
        </div>
        <button type="submit" class="btn btn-primary" name="proses">{{ isset($jabatan) ? 'Update' : 'Simpan' }}</button>
        <a href="{{ route('jabatan.index') }}" class="btn btn-default float-right"><i class="fas fa-arrow-left mr-2"></i>Batal</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
