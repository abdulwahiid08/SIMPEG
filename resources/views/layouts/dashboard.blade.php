<x-app-layout title="Dashboard">
    @section('content')
        <section class="section">
            <section class="section-header">
                <h1>Dashboard</h1>
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
            @if (Auth::check() && Auth::user()->role == 'admin')
                <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pegawai Aktif</h4>
                            </div>
                            <div class="card-body">
                                {{ \App\Models\Pegawai::where('status_pegawai', 'Aktif')->get()->count() }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-users-slash"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pegawai Non Aktif</h4>
                            </div>
                            <div class="card-body">
                                {{ \App\Models\Pegawai::where('status_pegawai', 'Non Aktif')->get()->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4></h4>
                            </div>
                            <div class="card-body">
                                {{ \App\Models\SuratKeluar::get()->count() }}
                            </div>
                        </div>
                    </div>
                </div>--}}
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="far fa-file-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pengajuan Pangkat</h4>
                            </div>
                            <div class="card-body">
                                {{ \App\Models\PengajuanPangkat::get()->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h4 class="mt-5">Sistem Informasi Manajemen Kepegawaian <br> SMAN 8 Pekanbaru</h4>
                        <img class="mt-4 mb-4" src="{{ asset('image/logo-sman8.png') }}" alt="Logo SMAN 8 Pekanbaru">
                    </div>
                </div>
            </div>
            @endif

        </section>
    @endsection
</x-app-layout>
