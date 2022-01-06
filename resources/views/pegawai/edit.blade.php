<x-app-layout title="Edit Data Pegawai">
    @section('content')
        <section class="section">
            <section class="section-header">
                <h1>Edit Data Pegawai</h1>
            </section>
             <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" class="needs-validation card-pengguna mt-3" enctype="multipart/form-data" novalidate>
                @method('put')
                @csrf
                <div class="card">
                    <div class="row card-body px-5 mt-3">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input id="nama" name="nama" type="text" value="{{ $pegawai->nama }}" class="form-control @error('nama') is-invalid @enderror" required>
                                @error('nama')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nip">Nomor Induk Pegawai</label>
                                <input id="nip" name="nip" type="text" value="{{ $pegawai->nip  }}" class="form-control" required>
                                @error('nip')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input id="tempat_lahir" name="tempat_lahir" value="{{ $pegawai->tempat_lahir  }}" type="text" class="form-control" required>
                                 @error('tempat_lahir')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input id="tanggal_lahir" name="tanggal_lahir" value="{{ $pegawai->tanggal_lahir }}" type="date" class="form-control" required>
                                 @error('tanggal_lahir')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" value="{{ $pegawai->email  }}" class="form-control" required>
                                @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nomor_telp">Nomor Handphone</label>
                                <input id="nomor_telp" name="nomor_telp" type="tel" value="{{ $pegawai->nomor_telp  }}" class="form-control" required>
                                @error('nomor_telp')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input name="foto" value="{{ $pegawai->foto  }}" class="form-control @error('foto') is-invalid @enderror" type="file" id="foto">
                                @error('foto')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" value="" name="jenis_kelamin" id="jenis_kelamin" required>
                                    <option selected>{{ $pegawai->jenis_kelamin  }}</option>
                                    <option>--------------</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <div class="invalid-feedback">
                                    Field Tidak Boleh Kosong!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select class="form-control" name="agama" id="agama" required>
                                    <option selected>{{ $pegawai->agama  }}</option>
                                    <option>-----------</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                                <div class="invalid-feedback">
                                    Field Tidak Boleh Kosong!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status_pegawai">Status Kepegawaian</label>
                                <select class="form-control" name="status_pegawai" id="status_pegawai" required>
                                    <option selected>{{ $pegawai->status_pegawai  }}</option>
                                    <option>-----------</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Non Aktif">Non Aktif</option>
                                </select>
                                <div class="invalid-feedback">
                                    Field Tidak Boleh Kosong!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenis_pegawai">Jenis Kepegawaian</label>
                                <select class="form-control" name="jenis_pegawai" id="jenis_pegawai" required>
                                    <option selected>{{ $pegawai->jenis_pegawai }}</option>
                                    <option>-----------</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Honorer">Honorer</option>
                                </select>
                                <div class="invalid-feedback">
                                    Field Tidak Boleh Kosong!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jabatan_id">Jabatan</label>
                                <select class="form-control" name="jabatan_id" id="jabatan_id" required>
                                    <option value="{{ $pegawai->jabatan->id }}" selected>{{ $pegawai->jabatan->jabatan }} {{ $pegawai->jabatan->bidang }}</option>
                                    <option>-----------</option>
                                @foreach ($jabatans as $jabatan)
                                    <option value="{{ $jabatan->id }}">{{ $jabatan->jabatan }} | {{ $jabatan->bidang }}</option>
                                @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Field Tidak Boleh Kosong!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="golongan_id">Golongan</label>
                                <select class="form-control" name="golongan_id" id="golongan_id" required>
                                    <option value="{{ $pegawai->golongan->id }}" selected>{{ $pegawai->golongan->golongan }}</option>
                                    <option>-----------</option>
                                @foreach ($golongans as $golongan)
                                    <option value="{{ $golongan->id }}">{{ $golongan->golongan }}</option>
                                @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Field Tidak Boleh Kosong!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ $pegawai->alamat }}</textarea>
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            <a href="{{ route('kelolapengguna.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    @endsection
</x-app-layout>
