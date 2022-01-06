<x-applayout title="Tambah Jabatan">
    @section('content')
        <section class="section">
            <section class="section-header">
                <h1>Tambah Jabatan</h1>
            </section>
            <form action="{{ route('jabatan.store') }}" method="POST" class="needs-validation card-pengguna mt-3" novalidate>
                @csrf
                <div class="card">
                    <div class="row card-body px-5 mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input id="jabatan" name="jabatan" type="text" class="form-control @error('jabatan') is-invalid @enderror" required>
                                @error('jabatan')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="bidang">Bidang</label>
                                <input id="bidang" name="bidang" type="text" class="form-control" required>
                                @error('bidang')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- <small class="text-secondary">Pastikan data yang anda isi benar</small> -->
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Create</button>
                                <a href="{{ route('golongan.index') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    @endsection
</x-applayout>
