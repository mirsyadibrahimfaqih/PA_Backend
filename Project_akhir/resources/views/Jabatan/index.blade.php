@extends('adminlte::page')

@section('title', 'Data jabatan')

@section('content_header')
    <h1>Data jabatan</h1>
@stop

@section('content')
@php
    $ar_judul = ['No', 'Nama','Aksi'];
    $no = 1;
@endphp

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Jabatan</h3>
        <br/>
        <br/>
        <a class="btn btn-primary" href="{{ route('jabatan.create') }}" role="button">Tambah jabatan <i class="fas fa-plus"></i></a>
        <a href="{{ url('jabatanpdf') }}" class="btn btn-info">
<i class="fas fa-file-pdf"></i></a>
<a class="btn btn-warning" href="{{ url('jabatanexcel') }}"
                   role="button"><i class="fas fa-file-excel"></i></a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    @foreach($ar_judul as $jdl)
                        <th>{{ $jdl }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($ar_jabatan as $b)
                    <tr>
                        <td style="text-align: center">{{ $no++ }}</td>
                        <td>{{ $b->nama }}</td> 
                        <td style="text-align: center"   >
                            <form method="POST" action="{{ route('jabatan.destroy', $b->id) }}">
                                @csrf  
                                @method("delete") 
                                <a class="btn btn-info" href="{{ route('jabatan.show', $b->id) }}"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-success" href="{{ route('jabatan.edit', $b->id) }}"><i class="fas fa-pen"></i></a>
                                <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data diHapus?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@stop

@section('js')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop
