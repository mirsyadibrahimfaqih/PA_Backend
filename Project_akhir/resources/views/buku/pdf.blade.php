@php
    $ar_judul = ['No', 'Tgl_bertamu', 'Tamu', 'Jabatan', 'Keperluan'];
    $no = 1;
@endphp

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Buku</h3>
        <br/>
    </div>
    <div class="card-body">
        <table border="1" width="100%" cellspacing="0" align="center">
            <thead>
                <tr>
                    @foreach($ar_judul as $jdl)
                        <th>{{ $jdl }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($ar_buku as $b)
                    <tr>
                        <td style="text-align: center">{{ $no++ }}</td>
                        <td>{{ $b->tgl_bertamu }}</td> 
                        <td>{{ $b->pen }}</td>
                        <td>{{ $b->jbtn }}</td> 
                        <td>{{ $b->keperluan }}</td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
