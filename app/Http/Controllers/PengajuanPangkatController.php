<?php

namespace App\Http\Controllers;

use App\Models\PengajuanPangkat;
use App\Http\Requests\StorePengajuanPangkatRequest;
use App\Http\Requests\UpdatePengajuanPangkatRequest;
use App\Models\Golongan;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanPangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengajuan-pangkat.index', [
            'data' => PengajuanPangkat::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengajuan-pangkat.create', [
            'jabatans' => Jabatan::all(),
            'golongans' => Golongan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePengajuanPangkatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getData = $request->validate([
            'user_id' => 'required',
            'jabatan' => 'required',
            'golongan' => 'required',
            'nama' => 'required|string',
            'nip' => 'required|unique:pegawais',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nomor_telp' => 'required',
            'email' => 'required|email',
            'foto' => 'required|mimes:png,jpg,jpeg|file|max:5024',
            'foto_karyaIlmiah' => 'required|mimes:png,jpg,jpeg|file|max:5024',
            'file_karyaIlmiah' => 'required|mimes:pdf|file|max:1024',
            'file_sertifikat' => 'required|mimes:pdf|file|max:1024',
            'file_waliKelas' => 'required|mimes:pdf|file|max:1024',
            'file_skTugas' => 'required|mimes:pdf|file|max:1024',
            'file_skJam' => 'required|mimes:pdf|file|max:1024',
            'file_ijazah' => 'required|mimes:pdf|file|max:1024',
        ]);

        // Mengambil file dengan nama asli
            // $getNameFoto = $request->file('foto_karyaIlmiah')->getClientOriginalName();
        // menyimpan file di folder file
            $getData['foto'] = $request->file('foto')->store('foto');
            $getData['foto_karyaIlmiah'] = $request->file('foto_karyaIlmiah')->store('foto-pengajuan');
            $getData['file_karyaIlmiah'] = $request->file('file_karyaIlmiah')->store('file-pengajuan');
            $getData['file_sertifikat'] = $request->file('file_sertifikat')->store('file-pengajuan');
            $getData['file_waliKelas'] = $request->file('file_waliKelas')->store('file-pengajuan');
            $getData['file_skTugas'] = $request->file('file_skTugas')->store('file-pengajuan');
            $getData['file_skJam'] = $request->file('file_skJam')->store('file-pengajuan');
            $getData['file_ijazah'] = $request->file('file_ijazah')->store('file-pengajuan');

        PengajuanPangkat::create($getData);

        return redirect()
                ->route('history', Auth::user()->id)
                ->with('pesan', 'Data Pengajuan Pangkat Anda Berhasil di Submit');
    }

    public function history($id)
    {
        $getData = PengajuanPangkat::where('user_id', $id)->get();
        return view('pengajuan-pangkat.history', [
            'data' => $getData,
        ]);
    }

    public function confirm(Request $request ,$id)
    {
        PengajuanPangkat::find($id)->update([
            'konfirmasi_pangkat' => $request->konfirmasi_pangkat,
        ]);

        return redirect()->route('pengajuanpangkat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengajuanPangkat  $pengajuanPangkat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pengajuan-pangkat.show', [
            'data' => PengajuanPangkat::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengajuanPangkat  $pengajuanPangkat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pengajuan-pangkat.edit', [
            'data' => PengajuanPangkat::find($id),
            'jabatans' => Jabatan::all(),
            'golongans' => Golongan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengajuanPangkatRequest  $request
     * @param  \App\Models\PengajuanPangkat  $pengajuanPangkat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $getData = $request->all();
        // PengajuanPangkat::find($id)->update($getData);

        $getData = $request->validate([
            'foto' => 'mimes:png,jpg,jpeg|file|max:5024',
            'foto_karyaIlmiah' => 'mimes:png,jpg,jpeg|file|max:5024',
            'file_karyaIlmiah' => 'mimes:pdf|file|max:1024',
            'file_sertifikat' => 'mimes:pdf|file|max:1024',
            'file_waliKelas' => 'mimes:pdf|file|max:1024',
            'file_skTugas' => 'mimes:pdf|file|max:1024',
            'file_skJam' => 'mimes:pdf|file|max:1024',
            'file_ijazah' => 'mimes:pdf|file|max:1024',
        ]);

        // Mengambil file dengan nama asli
        // $getNameFoto = $request->file('foto_karyaIlmiah')->getClientOriginalName();
        // menyimpan file di folder file
        if($request->file()) {
            $getData['foto'] = $request->file('foto')->store('foto');
            $getData['foto_karyaIlmiah'] = $request->file('foto_karyaIlmiah')->store('foto-pengajuan');
            $getData['file_karyaIlmiah'] = $request->file('file_karyaIlmiah')->store('file-pengajuan');
            $getData['file_sertifikat'] = $request->file('file_sertifikat')->store('file-pengajuan');
            $getData['file_waliKelas'] = $request->file('file_waliKelas')->store('file-pengajuan');
            $getData['file_skTugas'] = $request->file('file_skTugas')->store('file-pengajuan');
            $getData['file_skJam'] = $request->file('file_skJam')->store('file-pengajuan');
            $getData['file_ijazah'] = $request->file('file_ijazah')->store('file-pengajuan');

            PengajuanPangkat::find($id)->update($getData);
        }


        PengajuanPangkat::find($id)->update([
            'user_id' => $request->user_id,
            'jabatan' => $request->jabatan,
            'golongan' => $request->golongan,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'nomor_telp' => $request->nomor_telp,
            'email' => $request->email,
        ]);
        return redirect()
                ->route('history', Auth::user()->id)
                ->with('edit', 'Data Berhasil Di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengajuanPangkat  $pengajuanPangkat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PengajuanPangkat::find($id)->delete();
        return back();
    }
}
