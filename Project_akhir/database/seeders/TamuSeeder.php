<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tamu')->insert([
            ['nama' => 'Okita',
            'gender' => 'Male',
            'no_hp' => '085-'.rand(),
            'alamat' => 'Jl. Sudirman No. 123',
        ],

            ['nama' => 'Zora',
             'gender' => 'Male',
             'no_hp' => '081-'.rand(),
             'alamat' => 'Jl. Merpati No. 123',
         ],

             ['nama' => 'Sasha',
              'gender' => 'Female',
              'no_hp' => '082-'.rand(),
              'alamat' => 'Jl. Pahlawan No. 123',
          ],
        ]);
    }
}
