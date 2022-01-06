<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;

    protected $fillable = [
        'golongan',
        'uraian',
    ];


    // Membua Relasi Tabel
    // Model jabatan merupakan Tabel kait terhadap tabel pegawai
    // Satu golongan boloh memiliki banyak pegawai
    // belongsToMany
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'golongan_id');
    }

}
