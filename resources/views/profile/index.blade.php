<x-app-layout title="Profile">
    @section('content')
        <section class="section">
            <section class="section-header">
                <h1>Profile</h1>
            </section>
            <form action="{{ route('profile.update', Auth::user()->username) }}" class="needs-validation card-pengguna mt-3" method="POST" enctype="multipart/form-data" novalidate>
                @method('put')
                @csrf
                <div class="card">
                    <div class="row card-body mt-3 mb-4">
                        @if (Auth::user()->foto)
                            <div class="col-md-6">
                                <div class="content-image text-center">
                                    <img class="upload-image rounded-circle" id="uploadImg" src="{{ asset('storage/' . Auth::user()->foto) }}" alt="{{ Auth::user()->name }}">
                                    <input class="input-file-image" type="file" name="foto" id="imageInput">
                                </div>
                                @error('image')
                                    <div class="text-red-600 mt-4 text-xs">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @else
                            <div class="col-md-6">
                                <div class="content-image text-center">
                                    <img class="upload-image rounded-circle" id="uploadImg" src="{{ asset('image/tut-wuri-handayani.png') }}" alt="{{ Auth::user()->name }}">
                                    <input class="input-file-image" type="file" name="foto" id="imageInput">
                                </div>
                                @error('image')
                                    <div class="text-red-600 mt-4 text-xs">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif

                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" value="{{ $data->username }}" name="username" type="text" class="form-control @error('username') is-invalid @enderror" required>
                                    @error('username')
                                        <div class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" value="{{ $data->name }}" name="name" type="text" class="form-control" required>
                                    @error('name')
                                        <div class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" value="{{ $data->email }}" name="email" type="email" class="form-control" required>
                                    @error('email')
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
