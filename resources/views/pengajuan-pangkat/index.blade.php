<x-app-layout title="Data Pengajuan Pangakat">
    @section('content')
        <section class="section">
            <section class="section-header">
                <h1>Data Pengajuan Pangkat</h1>
            </section>
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
            @if (\App\Models\PengajuanPangkat::get()->count() !== 0)
                <div class="card">
                    <div class="card-body mt-3 mb-4">
                        <div class="table-responsive">
                            <table class="table table-bordered table-lg">
                            <tr class="text-center text-dark">
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Golongan</th>
                                <th>Jabatan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach ($data as $number => $item)
                            <tr class="text-dark">
                                <td>{{ $number + 1 }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->golongan }}</td>
                                <td>{{ $item->jabatan }}</td>
                                @if (!$item->konfirmasi_pangkat)
                                    <td class="text-center"><div class="badge badge-danger">Belum Konfirmasi</div></td>
                                @else
                                    <td class="text-center"><div class="badge badge-success">Terkonfirmasi</div></td>
                                @endif
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('pengajuanpangkat.show', $item->id) }}" class="btn btn-icon btn-sm btn-success mb-2 me-2">
                                            <i class="far fa-folder-open"></i>
                                        </a>
                                        {{-- <a href="{{ route('pengajuanpangkat.edit', $item->id) }}" class="btn btn-icon btn-sm btn-info mb-2 me-2 text-white">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a> --}}
                                    <!-- Button trigger modal -->
                                        <!-- Modal Hapus Golonga -->
                                        <a href="" class="btn btn-icon btn-sm btn-danger mb-2 text-white" data-bs-toggle="modal" data-bs-target="#hapusPengajuanModal{{ $item->id }}">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                        <div class="modal fade" id="hapusPengajuanModal{{ $item->id }}" tabindex="-1" aria-labelledby="hapusPengajuanModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="hapusPengajuanModalLabel">Hapus Data Pengajuan Pangkat</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('pengajuanpangkat.destroy', $item->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                        <div class="modal-body">
                                                            Apakah Anda Yakin Ingin Menghapus Data Ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                            <button type="submit" class="btn btn-primary">Ya</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Hapus Golongan -->
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            @endif
    @endsection
</x-app-layout>
