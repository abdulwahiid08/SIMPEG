<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::create([
            'jabatan_id' => 1,
            'golongan_id' => 1,
            'nama' => 'Abdul Wahid',
            'nip' => '11950113929',
            'tempat_lahir' => 'pekanbaru',
            'tanggal_lahir' => '29-12-2000',
            'jenis_kelamin'=> 'Laki-Laki',
            'agama' => 'Islam',
            'alamat' => 'Pekanbaru',
            'nomor_telp' => '09112312313',
            'email' => 'abdulwahid@gmail.com',
            'status_pegawai' => 'Aktif',
            'jenis_pegawai' => 'PNS',
            'foto' => 'wahid.png',
        ]);
        Pegawai::create([
            'jabatan_id' => 2,
            'golongan_id' => 1,
            'nama' => 'Melan Pratiwi',
            'nip' => '11950929',
            'tempat_lahir' => 'Duri',
            'tanggal_lahir' => '29-12-2010',
            'jenis_kelamin'=> 'Perempuan',
            'agama' => 'Islam',
            'alamat' => 'Pekanbaru',
            'nomor_telp' => '09112312313',
            'email' => 'melan@gmail.com',
            'status_pegawai' => 'Non Aktif',
            'jenis_pegawai' => 'PNS',
            'foto' => 'wahid.png',
        ]);
        Pegawai::create([
            'jabatan_id' => 3,
            'golongan_id' => 2,
            'nama' => 'Jefitra',
            'nip' => '11950113',
            'tempat_lahir' => 'Tembilahan',
            'tanggal_lahir' => '29-12-1960',
            'jenis_kelamin'=> 'Laki-Laki',
            'agama' => 'Kristen',
            'alamat' => 'Tembilahan',
            'nomor_telp' => '09112312313',
            'email' => 'Jefitrad@gmail.com',
            'status_pegawai' => 'Aktif',
            'jenis_pegawai' => 'PNS',
            'foto' => 'wahid.png',
        ]);
    }
}
