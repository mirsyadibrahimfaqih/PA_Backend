@extends('adminlte::page')
@section('title',
'Edit tamu')
@section('content_header')
<h1>Edit tamu</ h1>
    @stop
    @section('content')
    @foreach($tamu as $rs)
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit</h3>
        </div>
        <form method="POST" action="{{ route('tamu.update',$rs->id) }}">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control" id="nama">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="text" name="gender" value="{{ $rs->gender }}" class="form-control" id="gender">
                </div>
                <div class="form-group">
                    <label for="no_hp">No_hp</label>
                    <input type="text" name="no_hp" value="{{ $rs->no_hp }}" class="form-control" id="no_hp">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" value="{{ $rs->alamat }}" class="form-control" id="alamat">
                </div>
                </div>
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </div>

            <div class="card-footer">
                <button type="submit" name="proses" class="btn btn-primary">Ubah</button>
                <a href="{{ route('tamu.index')}}" class="btn btn-default float-right">
                    <i class="fas fa-arrow-left mr-2"></i>Batal
                </a>
            </div>
        </form>
    </div>
    @endforeach
    @stop

    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset ('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    @stop
    @section('js')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script src="{{ asset ('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset ('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset ('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset ('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset ('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset ('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset ('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset ('plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{ asset ('plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset ('plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset ('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset ('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset ('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset ('dist/js/adminlte.min.js')}}"></script>
    <script src="{{ asset ('dist/js/demo.js')}}"></script>
    @stop