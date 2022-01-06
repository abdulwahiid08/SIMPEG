<x-app-layout title="Kelola Pengguna">
    @section('content')
        <section class="section">
            <section class="section-header">
                <h1>Manajemen Pengguna</h1>
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
         @if (session()->has('hapus'))
                <div class="alert alert-info alert-dismissible show fade d-flex">
                    <div class="alert-body fw-bold">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <i class="fas fa-bullhorn mt-1 me-2"></i>
                        <b>Success!</b> {{ session('hapus') }}
                    </div>
                </div>
            @endif
        <div class="card">
            <div class="card-body mt-3 mb-4">
                <div class="text-end mb-4">
                    <a href="{{ route('kelolapengguna.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Tambah Pengguna
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-lg">
                    <tr class="text-center text-dark">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Hak Akses</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($data as $number => $item)
                    <tr class="text-dark">
                        <td>{{ $number + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                    @if ($item->role === 'admin')
                        <td>Admin</td>
                    @else
                        <td>Kepala Sekolah</td>
                    @endif
                        {{-- <td>{{ $item->perihal }}</td> --}}
                        <td>
                            <div class="d-flex">
                                <!-- Button trigger modal -->
                                <!--Modal  Reset Password -->
                                <a href="" class="btn btn-icon btn-sm btn-warning mb-2 me-2 text-white" data-bs-toggle="modal" data-bs-target="#resetModal{{ $item->id }}">
                                    <i class="fas fa-key"></i>
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="resetModal{{ $item->id }}" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="resetModalLabel">Reset Password</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('reset-password', $item->id) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body">
                                                    Whoops! Anda akan mereset Password {{ $item->username }} ke <span class="text-primary"><u>12345678</u></span>
                                                    <input type="hidden" name="password" value="12345678">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Reset Password</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Reset Password -->

                                <!-- Modal Hapus Pengguna -->
                                <a href="" class="btn btn-icon btn-sm btn-danger mb-2 text-white" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $item->id }}">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <div class="modal fade" id="hapusModal{{ $item->id }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hapusModalLabel">Hapus Pengguna</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('kelolapengguna.destroy', $item->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                                <div class="modal-body">
                                                    Apakah Anda Yakin Ingin Menghapus <span class="fw-bold text-primary">{{ $item->username }}</span> ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                    <button type="submit" class="btn btn-primary">Ya</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Hapus Pengguna -->
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
