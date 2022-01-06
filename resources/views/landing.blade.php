<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ url('css/costumLanding.css') }}">

     <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('font-awesome/all.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/all.min.css') }}">

    <title>Home | SIMPEG</title>
</head>
<body>
    <div class="p-4 mt-2">
        <div class="row">
            <div class="logo col-md">
               <img class="d-inline" src="{{ url('image/tut-wuri-handayani.png') }}" alt="" width="48">
               <p class="d-inline ms-3 fw-bold fs-5 text-decoration-none">SMA 8 Pekanbaru</p>
            </div>
        </div>

        <div class="content">
            <div class="row">
                <div class="font-landing col-md">
                    <h1 class="font-up">Sistem Informasi</h1>
                    <h1 class="font-down">Kepegawaian</h1>
                    <p class="fs-4">Pelayanan Pegawai SMA 8 Pekanbaru</p>
                    <a type="button" class="btn shadow rounded mt-3" href="{{ url('/login') }}">Masuk <i class="fas fa-sign-in-alt"></i></a>
                </div>
                <div class="col-md">
                    <img src="{{ url('image/bg-landing.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
