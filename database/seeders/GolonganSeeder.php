<?php

namespace Database\Seeders;

use App\Models\Golongan;
use Illuminate\Database\Seeder;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Golongan::create([
            'golongan' => 'IIIa',
            'uraian' => 'Penata Muda',
        ]);
        Golongan::create([
            'golongan' => 'IIIb',
            'uraian' => 'Penata Muda Tingkat 1',
        ]);
        Golongan::create([
            'golongan' => 'IIIc',
            'uraian' => 'Penata Muda Tingkat 2',
        ]);

    }
}
