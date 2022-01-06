<x-app-layout title="Detail Data Golongan">
    @section('content')
        <section class="section">
            <section class="section-header">
                <h1>Detail Data Golongan</h1>
            </section>
            <div class="card">
                <div class="card-body mt-3 mb-4">
                    {{-- <div class="mb-4">
                            <a href="{{ route('golongan.download') }}" class="btn btn-sm btn-success">
                                <i class="far fa-file-pdf"></i> <strong>PDF</strong>
                            </a>
                            <a href="{{ route('golongan.cetak') }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-print"></i> <strong>Print</strong>
                            </a>
                        </div> --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-lg">
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Golongan</th>
                            <th>Jabatan</th>
                        </tr>
                        @foreach ($data as $number => $item)
                        <tr>
                            <td>{{ $number + 1 }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->golongan->golongan }}</td>
                            <td>{{ $item->jabatan->jabatan }}</td>
                        </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endsection
</x-app-layout>
