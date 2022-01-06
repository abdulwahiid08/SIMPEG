<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pegawai.index', [
            'data' => Pegawai::all()
        ]);
    }


    public function downloadPDF()
    {
        $pegawai = Pegawai::all();

        // Syntax PDF
        $pdf = \PDF::loadView('pegawai.cetak', ['data' => $pegawai])->setPaper('A4', 'portrait');
        return $pdf->download('Laporan_Data_Pegawai.pdf');
    }

    public function cetakPDF()
    {
        $pegawai = Pegawai::all();

        // Syntax PDF
        $pdf = \PDF::loadView('pegawai.cetak', ['data' => $pegawai])->setPaper('A4', 'portrait');
        return $pdf->stream('Laporan_Data_Pegawai.pdf');
    }

    // Untuk Guru
    public function tambah()
    {
        return view('pegawai.tambah', [
            'jabatans' => Jabatan::all(),
            'golongans' => Golongan::all()
        ]);
    }

    public function buat(Request $request)
    {
        $getData = $request->validate([
            'user_id' => 'required',
            'jabatan_id' => 'required',
            'golongan_id' => 'required',
            'nama' => 'required|string',
            'nip' => 'required|unique:pegawais',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'nomor_telp' => 'required',
            'email' => 'required|email',
            'status_pegawai' => 'required',
            'jenis_pegawai' => 'required',
            'foto' => 'mimes:jpg,png,jpeg|file|max:5024',
        ]);

        if ($request->file('foto')) {
            // Mengambil file dengan nama asli
            $getNameFile = $request->file('foto')->getClientOriginalName();
            // menyimpan file di folder file
            $getData['foto'] = $request->file('foto')->storeAs('image', $getNameFile);
        }

        Pegawai::create($getData);

        return redirect()
            ->route('dashboard')
            ->with('pesan', 'Data Pegawai Berhasil Ditambah');

        // Pegawai::create([
        //     'jabatan_id' => $request->jabatan_id,
        //     'golongan_id' => $request->golongan_id,
        //     'nama' => $request->nama,
        //     'nip' => $request->nip,
        //     'tempat_lahir' => $request->tempat_lahir,
        //     'tanggal_lahir' => $request->tanggal_lahir,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        //     'agama' => $request->agama,
        //     'alamat' => $request->alamat,
        //     'nomor_telp' => $request->nomor_telp,
        //     'email' => $request->email,
        //     'status_pegawai' => $request->status_pegawai,
        //     'jenis_pegawai' => $request->jenis_pegawai,
        //     'foto' => $getFoto,
        // ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create', [
            'jabatans' => Jabatan::all(),
            'golongans' => Golongan::all()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePegawaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getData = $request->validate([
            'user_id' => 'required',
            'jabatan_id' => 'required',
            'golongan_id' => 'required',
            'nama' => 'required|string',
            'nip' => 'required|unique:pegawais,nip',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'nomor_telp' => 'required',
            'email' => 'required|email',
            'status_pegawai' => 'required',
            'jenis_pegawai' => 'required',
            'foto' => 'mimes:jpg,png,jpeg|file|max:5024',
        ]);

        if ($request->file('foto')) {
            // Mengambil file dengan nama asli
            $getNameFile = $request->file('foto')->getClientOriginalName();
            // menyimpan file di folder file
            $getData['foto'] = $request->file('foto')->storeAs('image', $getNameFile);
        }

        Pegawai::create($getData);

        return redirect()
            ->route('pegawai.index')
            ->with('pesan', 'Data Pegawai Berhasil Ditambah');

        // Pegawai::create([
        //     'jabatan_id' => $request->jabatan_id,
        //     'golongan_id' => $request->golongan_id,
        //     'nama' => $request->nama,
        //     'nip' => $request->nip,
        //     'tempat_lahir' => $request->tempat_lahir,
        //     'tanggal_lahir' => $request->tanggal_lahir,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        //     'agama' => $request->agama,
        //     'alamat' => $request->alamat,
        //     'nomor_telp' => $request->nomor_telp,
        //     'email' => $request->email,
        //     'status_pegawai' => $request->status_pegawai,
        //     'jenis_pegawai' => $request->jenis_pegawai,
        //     'foto' => $getFoto,
        // ]);


    }
    public function history($id)
    {
        $get = Pegawai::where('user_id', $id)->get();
        return view('pegawai.lihat', [
            'get' => $get
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show($id, User $user)
    {
        $get = Pegawai::where('user_id', $user)->get();
        return view('pegawai.show', [
            'data' => Pegawai::find($id),
            'get' => $get
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pegawai.edit', [
            'pegawai' => Pegawai::find($id),
            'jabatans' => Jabatan::all(),
            'golongans' => Golongan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePegawaiRequest  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $getFile = $request->validate([
            'foto' => 'mimes:png,jpg,jpeg|file|max:5024'
        ]);

        if ($request->file('foto')) {
            // Mengambil file dengan nama asli
            $getNameFile = $request->file('foto')->getClientOriginalName();
            // menyimpan file di folder file
            $getFile['foto'] = $request->file('foto')->storeAs('image', $getNameFile);
            Pegawai::find($id)->update($getFile);
        }


        $getData = $request->all();
        Pegawai::find($id)->update($getData);

        return redirect()
                ->route('pegawai.index')
                ->with('edit', 'Data Pegawai Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pegawai::find($id)->delete();

        return back();
    }
}
