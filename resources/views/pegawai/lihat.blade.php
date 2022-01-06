<x-app-layout title="Detail Data Pegawai">
    @section('content')
        <section class="section">
            <section class="section-header">
                <h1>Detail Data Pegawai</h1>
            </section>
        </section>
        <div class="card">
            <div class="card-body px-5 mt-3">
                @foreach ($get as $item)
                    <div>
                    <div>
                        <h5 class="text-dark">Status Kepegawaian </h5>
                    </div>
                @if ($item->status_pegawai == 'Aktif')
                    <div>
                        <p class="badge bg-success">{{ $item->status_pegawai }}</p>
                    </div>
                @else
                    <div>
                        <p class="badge bg-danger">{{ $item->status_pegawai }}</p>
                    </div>
                @endif
                </div>
                <div class="row mt-3">
                    <div class="col-md ms-4">
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="" width="280">
                    </div>
                    <div class="col-md text-dark">
                        <div class="row">
                            <div class="col-md">
                                <p>Nama Lengkap </p>
                            </div>
                            <div class="col-md">
                                <p>: {{ $item->nama }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <p>Nomor Induk Pegawai </p>
                            </div>
                            <div class="col-md">
                                <p>: {{ $item->nip }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <p>Email </p>
                            </div>
                            <div class="col-md">
                                <p>: {{ $item->email }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <p>Tempat Lahir </p>
                            </div>
                            <div class="col-md">
                                <p>: {{ $item->tempat_lahir }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <p>Tanggal Lahir </p>
                            </div>
                            <div class="col-md">
                                <p>: {{ $item->tanggal_lahir }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <p>Agama </p>
                            </div>
                            <div class="col-md">
                                <p>: {{ $item->agama }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <p>Jenis Kelamin </p>
                            </div>
                            <div class="col-md">
                                <p>: {{ $item->jenis_kelamin }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <p>Alamat </p>
                            </div>
                            <div class="col-md">
                                <p>: {{ $item->alamat }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <p>Nomor Telepon </p>
                            </div>
                            <div class="col-md">
                                <p>: {{ $item->nomor_telp }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <p>Jenis Kepegawaian </p>
                            </div>
                            <div class="col-md">
                                <p>: {{ $item->jenis_pegawai }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <p>Jabatan </p>
                            </div>
                            <div class="col-md">
                                <p>: {{ $item->jabatan->jabatan }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <p>Bidang </p>
                            </div>
                            <div class="col-md">
                                <p>: {{ $item->jabatan->bidang }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <p>Golongan </p>
                            </div>
                            <div class="col-md">
                                <p>: {{ $item->golongan->golongan }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    @endsection
</x-app-layout>
