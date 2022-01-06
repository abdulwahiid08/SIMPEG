<x-auth-layout title="Register">
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md bg-login">
                    <img src="{{ url('image/bg-login.png') }}" alt="" width="580">
                </div>
                <div class="col-md ms-5 content-register">
                    <div class="text-center icon-login">
                        <img src="{{ url('image/tut-wuri-handayani.png') }}" alt="" width="70">
                        <p class="mt-2">SMAN 8 Pekanbaru</p>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md mb-3">
                                <label for="name" class="col-form-label">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md mb-3">
                                <label for="username" class="col-form-label">{{ __('Username') }}</label>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md mb-3 mt-3">
                                <label for="role">Jabatan</label>
                                <select id="role" name="role" class="form-select" aria-label="Default select example" required>
                                    <option selected>Pilih Jabatan..</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                @enderror
                            </div>
                            <div class="col-md mb-4">
                                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <x-icon-pass/>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn shadow">
                                {{ __('Register') }}
                            </button>
                        </div>
                        <div class="text-center mt-3">
                            Have an account?
                            <a href="{{ route('login') }}" class="text-register"><b>Login</b></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
</x-auth-layout>
