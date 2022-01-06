<?php

namespace Database\Seeders;

use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GolonganSeeder::class,
            JabatanSeeder::class,
            PegawaiSeeder::class
        ]);

        User::create([
            'name' => 'Abdul  Wahid',
            'username' => 'wahid',
            'email' => 'abdulwahid@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123123123')
        ]);
        User::create([
            'name' => 'Abdul  Aziz',
            'username' => 'aziz',
            'email' => 'abdulaziz@gmail.com',
            'role' => 'guru',
            'password' => bcrypt('123123123')
        ]);
        // \App\Models\User::factory(10)->create();


    }
}
