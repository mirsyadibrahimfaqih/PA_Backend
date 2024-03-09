<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class ExportJabatan implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_tamu = DB::table('jabatan')
            ->select('jabatan.nama')
            ->get();

        return $ar_tamu;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nama'        
        ];
    }
}
