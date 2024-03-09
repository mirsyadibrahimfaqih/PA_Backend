@extends('adminlte::page')

@section('title', 'Form Buku')

@section('content_header')
    <h1>Data Tamu</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('tamu.store') }}">
        @csrf 
        @if(isset($tamu))
            @method('PUT')
        @endif
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ isset($tamu) ? $tamu->nama : old('nama') }}"/>
        </div>
        <div class="form-group">
            <label>Gender</label>
            <input type="text" name="gender" class="form-control" value="{{ isset($tamu) ? $tamu->gender : old('gender') }}"/>
        </div>
        <div class="form-group">
            <label>No_hp</label>
            <input type="text" name="no_hp" class="form-control" value="{{ isset($tamu) ? $tamu->no_hp : old('no_hp') }}"/>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="longtext" name="alamat" class="form-control" value="{{ isset($tamu) ? $tamu->alamat : old('alamat') }}"/>
        </div>
        <button type="submit" class="btn btn-primary" name="proses">{{ isset($tamu) ? 'Update' : 'Simpan' }}</button>
        <a href="{{ route('tamu.index') }}" class="btn btn-default float-right"><i class="fas fa-arrow-left mr-2"></i>Batal</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
