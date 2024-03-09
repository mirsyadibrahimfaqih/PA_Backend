@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="jumbotron text-center">
                    <h2 class="text-center">Terima Kasih sudah Register</h2>
                    <p class="text-center lead">Mohon tunggu persetujuan dari Administrator kami</p>
                    <p class="text-center">Anda akan diberitahu melalui email ketika akun Anda disetujui</p>
                    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
@endsection
