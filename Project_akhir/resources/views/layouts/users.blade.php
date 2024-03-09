@extends('adminlte::page')

@section('content')
      @if(Auth::user()->role == 'administrator')
        <div class="jumbotron">
          <h1 class="display-4">Kelola user</h1>
          <p class="lead">Ini halaman kelola user</p>
      </div>
   @else
      @include('layouts.accesDenied')
   @endif
@endsection
