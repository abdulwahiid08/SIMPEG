<x-auth-layout title="Login">
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 bg-login">
                    <img src="{{ url('image/bg-login.png') }}" alt="" width="580">
                </div>
                <div class="col-md-4 ms-5 content">
                    <div class="text-center icon-login">
                        <img src="{{ url('image/tut-wuri-handayani.png') }}" alt="" width="70">
                        <p class="mt-2">SMAN 8 Pekanbaru</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="col-form-label">{{ __('Username') }}</label>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="col-form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <x-icon-pass/>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="btn shadow">
                                {{ __('Login') }}
                            </button>

                            {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif --}}
                        </div>
                        {{-- <div class="text-center mt-3">
                            Dont have an account?
                            <a href="{{ route('register') }}" class="text-register"><b>Register</b></a>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    @endsection
</x-auth-layout>
