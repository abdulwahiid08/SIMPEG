<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanPangkatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_pangkats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nama');
            $table->string('nip')->unique();
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('nomor_telp');
            $table->string('email')->unique();
            $table->string('jabatan');
            $table->string('golongan');
            $table->string('foto_karyaIlmiah')->nullable();
            $table->string('file_karyaIlmiah')->nullable();
            $table->string('file_sertifikat')->nullable();
            $table->string('file_waliKelas')->nullable();
            $table->string('file_skTugas')->nullable();
            $table->string('file_skJam')->nullable();
            $table->string('file_ijazah')->nullable();
            $table->timestamp('konfirmasi_pangkat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_pangkats');
    }
}
