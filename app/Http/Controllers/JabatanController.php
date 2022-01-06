<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jabatan.index', [
            'data' => Jabatan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJabatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required',
            'bidang' => 'required'
        ]);

        Jabatan::create([
            'jabatan' => $request->jabatan,
            'bidang' => $request->bidang
        ]);

        return redirect()
                ->route('jabatan.index')
                ->with('pesan', 'Data Jabatan Berhasil Ditambkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $get = Pegawai::where('jabatan_id', $id)->get();

        return view('jabatan.show', [
            'data' => $get
        ]);
    }

    public function downloadPDF($id)
    {

        $get = Pegawai::where('jabatan_id', $id)->get();

        // Syntax PDF
        $pdf = \PDF::loadView('jabatan.cetak', ['data' => $get])->setPaper('A4', 'portrait');
        return $pdf->download('Laporan_Data_Jabatan.pdf');
    }

    public function cetakPDF($id)
    {
        $get = Pegawai::where('jabatan_id', $id)->get();

        // Syntax PDF
        $pdf = \PDF::loadView('jabatan.cetak', ['data' => $get])->setPaper('A4', 'portrait');
        return $pdf->stream('Laporan_Data_Jabatan.pdf');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJabatanRequest  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJabatanRequest $request, Jabatan $jabatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jabatan::find($id)->delete();

        return back();
    }
}
