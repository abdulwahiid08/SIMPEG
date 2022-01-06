<x-app-layout title="Data Pegawai">
    @section('content')
        <section class="section">
            <section class="section-header">
                <h1>Data Pegawai</h1>
            </section>
            @if (session()->has('pesan'))
                <div class="alert alert-success alert-dismissible show fade d-flex">
                    <div class="alert-body fw-bold">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <i class="fas fa-bullhorn mt-1 me-2"></i>
                        <b>Success!</b> {{ session('pesan') }}
                    </div>
                </div>
            @endif
            @if (session()->has('edit'))
                <div class="alert alert-info alert-dismissible show fade d-flex">
                    <div class="alert-body fw-bold">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <i class="fas fa-bullhorn mt-1 me-2"></i>
                        <b>Success!</b> {{ session('edit') }}
                    </div>
                </div>
            @endif
                <div class="card">
                    <div class="card-body mt-3 mb-4">
                        <div class="mb-4 float-start">
                            <a href="{{ route('download') }}" class="btn btn-sm btn-success">
                                <i class="far fa-file-pdf"></i> <strong>PDF</strong>
                            </a>
                            <a href="{{ route('cetak') }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-print"></i> <strong>Print</strong>
                            </a>
                        </div>
                        <div class="float-end mb-4">
                            <a href="{{ route('pegawai.create') }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-plus"></i> Tambah Pegawai
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-lg">
                            <tr class="text-center text-dark">
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Golongan</th>
                                <th>Jabatan</th>
                                <th>Bidang</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach ($data as $number => $item)
                            <tr class="text-dark">
                                <td>{{ $number + 1 }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->golongan->golongan }}</td>
                                <td>{{ $item->jabatan->jabatan }}</td>
                                <td>{{ $item->jabatan->bidang }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('pegawai.show', $item->id) }}" class="btn btn-icon btn-sm btn-success mb-2 me-2">
                                            <i class="far fa-folder-open"></i>
                                        </a>
                                        <a href="{{ route('pegawai.edit', $item->id) }}" class="btn btn-icon btn-sm btn-info mb-2 me-2 text-white">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    <form action="{{ route('pegawai.destroy', $item->id) }}" method="POST" id="data-{{ $item->id }}">
                                        @method('delete')
                                        @csrf
                                    </form>
                                    <button onclick="deleteRow({{ $item->id }})" class="btn btn-icon btn-sm btn-danger mb-2"> <i class="far fa-trash-alt"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </table>
                        </div>
                    </div>
                </div>
        </section>
    @endsection
</x-app-layout>
