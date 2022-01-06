<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            'jabatan' => 'Kepala Sekolah',
            'bidang' => 'ketua',
        ]);
        Jabatan::create([
            'jabatan' => 'Guru',
            'bidang' => 'Bahasa Indonesia',
        ]);
        Jabatan::create([
            'jabatan' => 'Guru',
            'bidang' => 'Matematika',
        ]);
    }
}
