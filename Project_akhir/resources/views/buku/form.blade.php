@extends('adminlte::page')

@section('title', 'Form Buku')

@section('content_header')
    <h1>Data Buku</h1>
@stop

@section('content')
    <form method="POST" action="{{ isset($buku_tamu) ? route('buku_tamu.update', $buku_tamu->id) : route('buku_tamu.store') }}">
        @csrf 
        @if(isset($buku_tamu))
            @method('PUT')
        @endif
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tgl_bertamu" class="form-control" value="{{ isset($buku_tamu) ? $buku_tamu->tgl_bertamu : old('tgl_bertamu') }}"/>
        </div>
        <div class="form-group">
            <label>Tamu</label>
            <select class="form-control" name="tamu_id">
                <option value="">-- Pilih Tamu --</option>
                @foreach($ar_tamu as $tamu)
                    <option value="{{ $tamu->id }}" {{ isset($buku_tamu) && $buku_tamu->tamu_id == $tamu->id ? 'selected' : '' }}>{{ $tamu->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Jabatan</label>
            <select class="form-control" name="jabatan_id">
                <option value="">-- Pilih Jabatan --</option>
                @foreach($ar_jabatan as $jabatan)
                    <option value="{{ $jabatan->id }}" {{ isset($buku_tamu) && $buku_tamu->jabatan_id == $jabatan->id ? 'selected' : '' }}>{{ $jabatan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Keperluan</label>
            <input type="text" name="keperluan" class="form-control" value="{{ isset($buku_tamu) ? $buku_tamu->keperluan : old('keperluan') }}"/>
        </div>
        <button type="submit" class="btn btn-primary" name="proses">{{ isset($buku_tamu) ? 'Update' : 'Simpan' }}</button>
        <a href="{{ route('buku_tamu.index') }}" class="btn btn-default float-right"><i class="fas fa-arrow-left mr-2"></i>Batal</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
