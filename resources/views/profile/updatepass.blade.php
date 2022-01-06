<x-app-layout title="Update Password">
    @section('content')
        <section class="section">
            <section class="section-header">
                <h1>Update Password</h1>
            </section>
            <form action="{{ route('updatepassword', Auth::user()->username) }}" class="needs-validation card-pengguna mt-3" method="POST" enctype="multipart/form-data" novalidate>
                @method('put')
                @csrf
                <div class="card">
                    <div class="card-body mt-3 mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_lama">Password Lama</label>
                                <input id="password_lama" type="password" class="form-control @error('password_lama') is-invalid @enderror" name="password_lama">
                                @error('password_lama')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <x-icon-pass/>
                                @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                                <!-- <small class="text-secondary">Pastikan data yang anda isi benar</small> -->
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                                </div>
                            </div>
                    </div>
                </div>
            </form>
        </section>
    @endsection
</x-app-layout>
