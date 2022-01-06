<x-app-layout title="Detail Data Pegawai">
    @section('content')
        <section class="section">
            <section class="section-header">
                <h1>Detail Data Pegawai</h1>
            </section>
        </section>
        <div class="card">
            <div class="card-body px-5 mt-3">
                <div>
                    <div>
                    <h5 class="text-dark">Status Kepegawaian </h5>
                    </div>
                @if ($data->status_pegawai == 'Aktif')
                    <div>
                        <p class="badge bg-success">{{ $data->status_pegawai }}</p>
                    </div>
                @else
                    <div>
                        <p class="badge bg-danger">{{ $data->status_pegawai }}</p>
                    </div>
                @endif
                </div>
                <div class="row mt-3">
                    <div class="col-md ms-4">
                        <img src="{{ asset('storage/' . $data->foto) }}" alt="" width="280">
                    </div>
                    <div class="col-md text-dark">
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
                                <p>Agama </p>
                            </div>
                            <div class="col-md">
                                <p>: {{ $data->agama }}</p>
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
                                <p>Jenis Kepegawaian </p>
                            </div>
                            <div class="col-md">
                                <p>: {{ $data->jenis_pegawai }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <p>Jabatan </p>
                            </div>
                            <div class="col-md">
                                <p>: {{ $data->jabatan->jabatan }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <p>Bidang </p>
                            </div>
                            <div class="col-md">
                                <p>: {{ $data->jabatan->bidang }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <p>Golongan </p>
                            </div>
                            <div class="col-md">
                                <p>: {{ $data->golongan->golongan }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
