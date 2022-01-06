<x-app-layout title="Pengajuan Pangkat">
    @section('content')
        <section class="section">
            <section class="section-header">
                <h1>Pengajuan Pangkat</h1>
            </section>
            <div class="card">
                <div class="card-body text-dark">
                    <h6>Syarat Pengajuan Pangkat :</h6>
                    <div class="ms-3 p-syarat">
                        <p>1. Mengisi Biodata Diri</p>
                        <p>2. Lampirkan Foto Bewarna 3x4</p>
                        <p>3. Lampirkan File Karya Ilmiah / Penelitian Tindakan Kelas</p>
                        <p>4. Lampirkan Foto Seminar Karya Ilmiah / Penelitian Tindakan Kelas</p>
                        <p>5. Lampirkan File Sertifikat Pelatihan / Seminar</p>
                        <p>6. Lampirkan SK Wali Kelas</p>
                        <p>7. Lampirkan SK Tugas</p>
                        <p>8. Lampirkan SK Jam Ngajar</p>
                        <p>9. Lampirkan Ijazah Terakhir</p>
                    </div>
                </div>
            </div>
            <form action="{{ route('pengajuanpangkat.store') }}" method="POST" class="needs-validation card-pengguna mt-3" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="card">
                    <div class="row card-body px-5 mt-3">
                        <div class="col-md">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input id="nama" name="nama" type="text" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" required>
                                @error('nama')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nip">Nomor Induk Pegawai</label>
                                <input id="nip" name="nip" type="text" value="{{ old('nip') }}" class="form-control" required>
                                @error('nip')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" type="text" class="form-control" required>
                                 @error('tempat_lahir')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input id="tanggal_lahir" name="tanggal_lahir" type="date" value="{{ old('tanggal_lahir') }}" class="form-control" required>
                                 @error('tanggal_lahir')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control" required>
                                @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nomor_telp">Nomor Handphone</label>
                                <input id="nomor_telp" name="nomor_telp" type="tel" value="{{ old('nomor_telp') }}" class="form-control" required>
                                @error('nomor_telp')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" value="{{ old('jenis_kelamin') }}" name="jenis_kelamin" id="jenis_kelamin" required>
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <div class="invalid-feedback">
                                    Field Tidak Boleh Kosong!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Bidang</label>
                                <select class="form-control" name="jabatan" value="{{ old('jabatan') }}" id="jabatan" required>
                                    <option selected>Pilih Jabatan</option>
                                @foreach ($jabatans as $jabatan)
                                    <option value="{{ $jabatan->bidang }}">{{ $jabatan->jabatan }} | {{ $jabatan->bidang }}</option>
                                @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Field Tidak Boleh Kosong!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="golongan">Golongan</label>
                                <select class="form-control" name="golongan" id="golongan" required>
                                    <option selected>Pilih Golongan Kepegawaian</option>
                                @foreach ($golongans as $golongan)
                                    <option value="{{ $golongan->golongan }}">{{ $golongan->golongan }}</option>
                                @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Field Tidak Boleh Kosong!
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input name="foto" class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" required>
                                @error('foto')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="foto_karyaIlmiah">Foto Seminar Karya Ilmiah / PTK</label>
                                <input name="foto_karyaIlmiah" class="form-control @error('foto_karyaIlmiah') is-invalid @enderror" type="file" id="foto_karyaIlmiah" required>
                                @error('foto_karyaIlmiah')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file_karyaIlmiah">File Karya Ilmiah / PTK</label>
                                <input name="file_karyaIlmiah" class="form-control @error('file_karyaIlmiah') is-invalid @enderror" type="file" id="file_karyaIlmiah" required>
                                @error('file_karyaIlmiah')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file_sertifikat">File Sertifikat Pelatihan / Seminar</label>
                                <input name="file_sertifikat" class="form-control @error('file_sertifikat') is-invalid @enderror" type="file" id="file_sertifikat" required>
                                @error('file_sertifikat')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file_waliKelas">File SK Wali Kelas</label>
                                <input name="file_waliKelas" class="form-control @error('file_waliKelas') is-invalid @enderror" type="file" id="file_waliKelas" required>
                                @error('file_waliKelas')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file_skTugas">File SK Tugas</label>
                                <input name="file_skTugas" class="form-control @error('file_skTugas') is-invalid @enderror" type="file" id="file_skTugas" required>
                                @error('file_skTugas')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file_skJam">File SK Jam Ngajar</label>
                                <input name="file_skJam" class="form-control @error('file_skJam') is-invalid @enderror" type="file" id="file_skJam" required>
                                @error('file_skJam')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file_ijazah">File Ijazah Terakhir </label>
                                <input name="file_ijazah" class="form-control @error('file_ijazah') is-invalid @enderror" type="file" id="file_ijazah" required>
                                @error('file_ijazah')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" value="{{ old('alamat') }}" id="alamat" rows="3"></textarea>
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-share-square"></i> Submit</button>
                            <a href="{{ route('kelolapengguna.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    @endsection
</x-app-layout>
