@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card">
        <div class="card-body text-center">
            <h1>Welcome</h1>
            <p>Welcome to this beautiful admin panel. You can manage your users, data, and much more here.</p>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
