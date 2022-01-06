<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }} | SIMPEG</title>

     <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('font-awesome/all.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <!-- CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/costumApp.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/costumAuth.js') }}" defer></script>
    <script src="{{ asset('js/previewImage.js') }}" defer></script>
</head>
   <body>
      <div id="app">
         <div class="main-wrapper">
            <div class="navbar-bg"></div>
               <nav class="navbar navbar-expand-lg main-navbar">
                  <form class="form-inline mr-auto">
                        <ul class="navbar-nav mr-3">
                           <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        </ul>
                  </form>
                @if (Auth::check())
                    <ul class="navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            @if (Auth::user()->foto)
                                <img alt="image" src="{{ asset('storage/' . Auth::user()->foto ) }}" class="rounded-circle mr-1">
                            @else
                                <img alt="image" src="{{ asset('image/tut-wuri-handayani.png') }}" class="rounded-circle mr-1">
                            @endif
                                <div class="d-sm-none d-lg-inline-block">
                                    Hi, {{ Auth::user()->name }}
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mt-2">
                                <div class="dropdown-title">
                                    You Are <strong class="text-primary fw-bold">{{ Auth::user()->role }}</strong>
                                </div>
                                @if (Auth::user()->role !== 'admin')
                                    <a href="{{ route('profile', Auth::user()->username) }}" class="dropdown-item has-icon">
                                        <i class="far fa-user"></i> Profile
                                    </a>
                                    <a href="{{ route('password', Auth::user()->username) }}" class="dropdown-item has-icon">
                                        <i class="fas fa-key"></i> Ganti Password
                                    </a>
                                @endif
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                @endif
                </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                <div class="sidebar-brand mt-4">
                    <img src="{{ url('image/tut-wuri-handayani.png') }}" alt="" width="70">
                    <p class="mt-3 font-icon">SMAN 8 Pekanbaru</p>
                </div>
                {{-- Sidebar Close --}}
                <div class="sidebar-brand sidebar-brand-sm mt-2 mb-4">
                    <img src="{{ url('image/tut-wuri-handayani.png') }}" alt="" width="35">
                </div>
                {{-- end --}}
                {{-- @if (Auth::check())
                @endif --}}
                @if (Auth::check() && Auth::user()->role === 'admin')
                <!-- SibeBar Untuk Bagian TU -->
                    <ul class="sidebar-menu mt-5">
                        <li class="menu-header">Dashboard</li>
                        <li class="{{ active_item('dashboard') }}">
                            <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-home"></i></i><span>Home</span></a>
                        </li>
                        <li class="menu-header">User</li>
                        <li class="{{ active_item('kelolapengguna.index') }}">
                            <a class="nav-link" href="{{ route('kelolapengguna.index') }}"><i class="fas fa-users"></i> <span>Manajemen Pengguna</span></a>
                        </li>
                        <li class="menu-header">Menu</li>
                        <li class="nav-item dropdown">
                            <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-th-large"></i> <span>Data Master</span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="nav-link" href="{{ route('golongan.index') }}">Data Golongan</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ route('jabatan.index') }}">Data Jabatan</a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ active_item('pegawai.index') }}">
                            <a class="nav-link" href="{{ route('pegawai.index') }}"><i class="fas fa-portrait"></i><span>Data Pegawai</span></a>
                        </li>
                        {{-- <li class="{{ active_item('gaji.index') }}">
                            <a class="nav-link" href="{{ route('gaji.index') }}"><i class="fas fa-portrait"></i><span>Data Gaji Pegawai</span></a>
                        </li> --}}
                        <li class="{{ active_item('pengajuanpangkat.index') }}">
                            <a class="nav-link" href="{{ route('pengajuanpangkat.index') }}"><i class="fas fa-money-check"></i><span>Pengajuan Pangkat</span></a>
                        </li>
                    </ul>
                    <!-- END Bagian TU -->
                @else
                <!-- SideBar untuk Pengguna Umum -->
                <ul class="sidebar-menu mt-5">
                    <li class="menu-header">Dashboard</li>
                    <li class="{{ active_item('dashboard') }}">
                        <a href="{{ Route('dashboard') }}" class="nav-link"><i class="fas fa-home"></i></i><span>Home</span></a>
                    </li>
                    <li class="menu-header">Menu</li>
                    <li class="{{ active_item('tambah') }}">
                        <a class="nav-link" href="{{ route('tambah') }}"><i class="fas fa-file-alt"></i><span>Input Data Pegawai</span></a>
                    </li>
                    <li class="{{ active_item('history-pegawai', Auth::user()->id) }}">
                        <a class="nav-link" href="{{ route('history-pegawai', Auth::user()->id) }}"><i class="fas fa-user"></i><span>Biodata Pegawai</span></a>
                    </li>
                    <li class="{{ active_item('pengajuanpangkat.create') }}">
                        <a class="nav-link" href="{{ route('pengajuanpangkat.create') }}"><i class="fas fa-money-check"></i><span>Pengajuan Pangkat</span></a>
                    </li>
                    <li class="{{ active_item('history', Auth::user()->id) }}">
                        <a class="nav-link" href="{{ route('history', Auth::user()->id) }}"><i class="fas fa-file-alt"></i><span>History Pengajuan</span></a>
                    </li>
                </ul>
                <!-- END Pengguna Umum -->
                @endif
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>

            <x-footer></x-footer>
            </div>
        </div>

        <!-- My JS -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- General JS Scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="{{ asset('admin/js/stisla.js') }}"></script>

        <!-- Template JS File -->
        <script src=" {{ asset('admin/js/scripts.js') }}"></script>
        <script src="{{ asset('admin/js/costum.js') }}"></script>

        <!-- Page Specific JS File -->
        <script src="{{ asset('admin/js/page/forms-advanced-forms.js') }}"></script>

        <!-- Page Specific JS File -->
        <script src="{{ asset('admin/js/page/index-0.js') }}"></script>

        <!-- Sweet Alert js-->
    <script src="{{ asset('admin/js/page/modules-sweetalert.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

    <!-- Page Table Specific JS File -->
    <script src="{{ asset('admin/js/page/components-table.js') }}"></script>

    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{ asset('js/costumSweetAlert.js') }}"></script>

    </body>
</html>
