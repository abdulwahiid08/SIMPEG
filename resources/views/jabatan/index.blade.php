<x-app-layout title="Data Jabatan">
    @section('content')
        <section class="section">
            <section class="section-header">
                <h1>Data Jabatan</h1>
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
            <div class="card">
                <div class="card-body mt-3 mb-4">
                    <div class="text-end mb-4">
                        <a href="{{ route('jabatan.create') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus"></i> Tambah Jabatan
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-lg">
                        <tr class="text-center text-dark">
                            <th>No</th>
                            <th>Jabatan</th>
                            <th>Bidang</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($data as $number => $item)
                        <tr class="text-dark">
                            <td>{{ $number + 1 }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>{{ $item->bidang }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('jabatan.show', $item->id) }}" class="btn btn-icon btn-sm btn-success mb-2 me-2">
                                        <i class="far fa-folder-open"></i>
                                    </a>
                                <form action="{{ route('jabatan.destroy', $item->id) }}" method="POST" id="data-{{ $item->id }}">
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
