@extends('adminlte::page')
@section('title',
'Edit Buku')
@section('content_header')
<h1>Edit Buku</ h1>
    @stop
    @section('content')
    @php
    $rs1 = App\Models\Jabatan::all();
    $rs2 = App\Models\Tamu::all();
    @endphp
    @foreach($buku as $rs)
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit</h3>
        </div>
        <form method="POST" action="{{ route('buku_tamu.update',$rs->id) }}">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="tgl_berteamu">Tanggal</label>
                    <input type="date" name="tgl_bertamu" value="{{ $rs->tgl_bertamu }}" class="form-control" id="tgl_bertamu">
                </div>
                <div class="form-group">
                    <label for="nama">Jabatan</label>
                    <select class="form-control" name="jabatan_id">
                        <option value="">-- Pilih Jabatan --</option>
                        @foreach($rs1 as $p)
                        @php
                        $sel1 = ($p->id == $rs->jabatan_id) ? 'selected' : '';
                        @endphp
                        <option value="{{ $p->id }}" {{ $sel1 }}>{{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tamu</label>
                    <select class="form-control" name="tamu_id">
                        <option value="">-- Pilih Tamu --</option>
                        @foreach($rs2 as $pen)
                        @php
                        $sel2 = ($pen->id == $rs->tamu_id) ? 'selected' : '';
                        @endphp
                        <option value="{{ $pen->id }}" {{ $sel2 }}>{{ $pen->nama }}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                    <label for="keperluan">Keperluan</label>
                    <input type="text" name="keperluan" value="{{ $rs->keperluan }}" class="form-control" id="keperluan">
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
                <a href="{{ route('buku_tamu.index')}}" class="btn btn-default float-right">
                    <i class="fas fa-arrow-left mr-2"></i>Batal
                </a>
            </div>
        </form>
    </div>
    @endforeach
    @stop

    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset ('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    @stop
    @section('js')
    <!-- <script> console.log('Hi!'); </script> -->
    <!-- Page specific script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <!-- jQuery -->
    <script src="{{ asset ('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset ('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- DataTables  & Plugins -->
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
    <!-- AdminLTE App -->
    <script src="{{ asset ('dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset ('dist/js/demo.js')}}"></script>
    @stop