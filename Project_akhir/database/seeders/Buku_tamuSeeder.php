<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Buku_tamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buku_tamu')->insert([
            [
                'tgl_bertamu' => now(),
                'tamu_id' => 1,
                'jabatan_id' => 1,
                'keperluan' => 'Meeting',
            ],
            [
                'tgl_bertamu' => now(),
                'tamu_id' => 1,
                'jabatan_id' => 1,
                'keperluan' => 'Belajar Laravel',
            ],
            [
                'tgl_bertamu' => now(),
                'tamu_id' => 1,
                'jabatan_id' => 1,
                'keperluan' => 'Seminar Laravel',
            ]
        ]);
    }
}
