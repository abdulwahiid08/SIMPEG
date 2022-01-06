<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanPangkat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $fillable = [
    //     'user_id',
    //     'jabatan',
    //     'golongan',
    //     'nama' ,
    //     'nip' ,
    //     'tempat_lahir',
    //     'tanggal_lahir',
    //     'alamat',
    //     'nomor_telp',
    //     'email' ,
    //     'foto_karyaIlmiah' ,
    //     'file_karyaIlmiah',
    //     'file_sertifikat',
    //     'file_waliKelas',
    //     'file_skTugas',
    //     'file_skJam',
    //     'file_ijazah',
    //     'konfirmasi_pangkat'
    // ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
