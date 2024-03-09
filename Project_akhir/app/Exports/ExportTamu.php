<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class ExportTamu implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */   
     public function collection()
    {
        $ar_tamu = DB::table('tamu')
            ->select('tamu.nama', 'tamu.gender', 'tamu.no_hp', 'tamu.alamat')
            ->get();

        return $ar_tamu;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nama',
            'Gender',
            'No_hp',
            'Alamat'        
        ];
    }
}
