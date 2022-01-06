<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/cetak.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/components.css') }}"> --}}

    <title>Laporan Data Pegawai</title>
</head>
<body>
    <div class="text-center">
        <h5>PEMERINTAH PROVINSI RIAU</h5>
        <h5>DINAS PENDIDIKAN</h5>
        <h4>SMA NEGERI 8 PEKANBARU</h4>
        <p class="mt-0">Jl. Abdul Muis No.14, Cinta Raja, Kec. Sail, Kota Pekanbaru, Riau 28127</p>
    </div>
    <hr>
    <div>
        {{-- <img src="{{ asset('image/logo-sman8.png') }}" alt=""> --}}
        <h6 class="text-center"> Laporan Data Pegawai <br> SMAN 8 Pekanbaru</h6>
        <p class="text-right">Tanggal Cetak: <b>{{ date('d-M-Y') }}</b></p>
    </div>
    <div>
        <table class="table table-bordered text-center" align="center">
            <tr class="header-table">
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Tanggal Lahir</th>
                <th>Golongan</th>
                <th>Bidang</th>
                <th>Agama</th>
                <th>Jenis Pegawai</th>
            </tr>
            @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nip }}</td>
                <td>{{ $item->tanggal_lahir }}</td>
                <td>{{ $item->golongan->golongan }}</td>
                <td>{{ $item->jabatan->bidang }}</td>
                <td>{{ $item->agama }}</td>
                <td>{{ $item->jenis_pegawai }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="text-right">
        <p class="mb-5">Kepala Bagian Tata Usaha</p>
        <p>_______________________</p>
    </div>
</body>
</html>
