<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class ExportBuku implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $ar_buku = DB::table('buku_tamu')
            ->join('jabatan', 'jabatan.id', '=', 'buku_tamu.jabatan_id')
            ->join('tamu', 'tamu.id', '=', 'buku_tamu.tamu_id')
            ->select('buku_tamu.tgl_bertamu', 'jabatan.nama AS jabatan', 'tamu.nama AS tamu', 'buku_tamu.keperluan')
            ->get();

        return $ar_buku;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'tgl_bertamu',
            'Jabatan',
            'Tamu',
            'Keperluan'        
        ];
    }
}
