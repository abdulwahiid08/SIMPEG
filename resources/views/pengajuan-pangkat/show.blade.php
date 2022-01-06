<x-app-layout title="Detail Pengajuan Pangakat">
    @section('content')
        <section class="section">
            <section class="section-header">
                <h1>Detail Pengajuan Pangkat</h1>
            </section>
            <div class="card">
                <div class="card-body px-5 mt-3">
                    <div>
                        <h5 class="text-dark">
                            {{ $data->nama }}
                            <small class="text-secondary">
                                nip. {{ $data->nip }}
                            </small>
                        </h5>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md ms-4">
                            <img src="{{ asset('storage/' . $data->foto) }}" alt="" width="280">
                        </div>
                        <div class="col-md text-dark link-file">
                            <div class="row">
                                <div class="col-md">
                                    <p>Nama Lengkap </p>
                                </div>
                                <div class="col-md">
                                    <p>: {{ $data->nama }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p>Nomor Induk Pegawai </p>
                                </div>
                                <div class="col-md">
                                    <p>: {{ $data->nip }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p>Email </p>
                                </div>
                                <div class="col-md">
                                    <p>: {{ $data->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p>Tempat Lahir </p>
                                </div>
                                <div class="col-md">
                                    <p>: {{ $data->tempat_lahir }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p>Tanggal Lahir </p>
                                </div>
                                <div class="col-md">
                                    <p>: {{ $data->tanggal_lahir }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p>Jenis Kelamin </p>
                                </div>
                                <div class="col-md">
                                    <p>: {{ $data->jenis_kelamin }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p>Alamat </p>
                                </div>
                                <div class="col-md">
                                    <p>: {{ $data->alamat }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p>Nomor Telepon </p>
                                </div>
                                <div class="col-md">
                                    <p>: {{ $data->nomor_telp }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p>Bidang </p>
                                </div>
                                <div class="col-md">
                                    <p>: {{ $data->jabatan }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p>Golongan </p>
                                </div>
                                <div class="col-md">
                                    <p>: {{ $data->golongan}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p>Foto Seminar Karya Ilmiah/PTK </p>
                                </div>
                                <div class="col-md">
                                    <a href="{{ asset('storage/' . $data->foto_karyaIlmiah) }}">: Lihat</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p>File Karya Ilmiah/PTK </p>
                                </div>
                                <div class="col-md">
                                    <a href="{{ asset('storage/' . $data->file_karyaIlmiah) }}">: Lihat</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p>File Sertifikat Pelatihan/Seminar </p>
                                </div>
                                <div class="col-md">
                                    <a href="{{ asset('storage/' . $data->file_sertifikat) }}">: Lihat</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p>File SK Wali Kelas </p>
                                </div>
                                <div class="col-md">
                                    <a href="{{ asset('storage/' . $data->file_waliKelas) }}">: Lihat</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p>File SK Tugas </p>
                                </div>
                                <!-- untuk menampilakn file ke tab baru menggunakan target="_blank" -->
                                <div class="col-md">
                                    <a href="{{ asset('storage/' . $data->file_skTugas) }}" target="_blank">: Lihat</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p>File SK Jam Ngajar </p>
                                </div>
                                <div class="col-md">
                                    <a href="{{ asset('storage/' . $data->file_skJam) }}">: Lihat</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p>File Ijazah Terakhir </p>
                                </div>
                                <div class="col-md">
                                    <a href="{{ asset('storage/' . $data->file_ijazah) }}">: Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (!$data->konfirmasi_pangkat && Auth::user()->role == 'admin')
                        <form action="{{ route('pengajuanpangkat.confirm', $data->id) }}" class="text-center ms-5 mt-4 mb-4" method="POST">
                            @method('put')
                            @csrf
                            {{-- @method('put') --}}
                            <input type="hidden" name="konfirmasi_pangkat" value="{{ now() }}">
                            <button type="submit" class="btn btn-success fs-6">Konfirmasi</button>
                        </form>
                    @endif
                </div>
            </div>
        </section>
    @endsection
</x-app-layout>
