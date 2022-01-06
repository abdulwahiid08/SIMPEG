<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jabatan_id',
        'golongan_id',
        'nama',
        'nip',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'nomor_telp',
        'email',
        'status_pegawai',
        'jenis_pegawai',
        'foto',
    ];

    // Membua Relasi Tabel
    // Model Pegawai merupakan Tabel kait Relasi terhadap tabel golongan
    // Satu Pegawai hanya boloh memiliki satu golongan
    // karena tabel pegawai sebagai kait terhadap tabel golongan
    // Maka syntax nya belongsTo
    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }

    // Membua Relasi Tabel
    // Model Pegawai merupakan Tabel kait Relasi terhadap tabel jabatan
    // Satu Pegawai hanya boloh memiliki satu jabatan
    // karena tabel pegawai sebagai kait terhadap tabel jabatan
    // Maka syntax nya belongsTo
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
