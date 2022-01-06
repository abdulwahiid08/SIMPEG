<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jabatan',
        'bidang',
    ];


    // Membuat Relasi Tabel
    // Model jabatan merupakan Tabel utama terhadap tabel pegawai
    // Satu jabatan boloh memiliki banyak pegawai
    // hasMany
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'jabatan_id');
    }
}
