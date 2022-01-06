<x-applayout title="Tambah Golongan">
    @section('content')
        <section class="section">
            <section class="section-header">
                <h1>Tambah Golongan</h1>
            </section>
            <form action="{{ route('golongan.store') }}" method="POST" class="needs-validation card-pengguna mt-3" novalidate>
                @csrf
                <div class="card">
                    <div class="row card-body px-5 mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="golongan">Golongan</label>
                                <input id="golongan" name="golongan" type="text" class="form-control @error('golongan') is-invalid @enderror" required>
                                @error('golongan')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="uraian">Uraian</label>
                                <input id="uraian" name="uraian" type="text" class="form-control" required>
                                @error('uraian')
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
