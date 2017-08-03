<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kunjungan;
use App\Dokter;
use App\Pasien;
use Auth;
use Session;
use PDF;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        $kunjungans = Kunjungan::where('no_kunjungan', 'LIKE', '%'.$q.'%')
                                ->orderBy('no_kunjungan')
                                ->paginate(10);
        return view('kunjungan.index')->with(compact('q', 'kunjungans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dokter = Dokter::pluck('nama_dokter', 'id');
        $pasien = Pasien::pluck('nama_pasien', 'id');
        return view('kunjungan.create')->with(compact('dokter', 'pasien'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'no_kunjungan'=>'required|unique:kunjungans',
          'tgl_kunjungan'=>'required',
          'dokter_id'=>'required',
          'pasien_id'=>'required'
        ]);
        $data = $request->all();
        $dokter = Dokter::whereIn('id', array($request->get('dokter_id')))->get();
        foreach ($dokter as $key => $value) {
            $poli = $value->poli;
        }
        $data['poli'] = $poli;
        $data['user_id'] = Auth::user()->id;
        $kunjungan = Kunjungan::create($data);
        Session::flash("flash_notification", [
           "level"=>"success",
           "message"=>"<strong>Sukses! </strong> <strong>$kunjungan->no_kunjungan</strong> berhasil disimpan."
       ]);
        return redirect()->route('kunjungan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dokter = Dokter::pluck('nama_dokter', 'id');
        $pasien = Pasien::pluck('nama_pasien', 'id');
        $kunjungan = Kunjungan::findOrFail($id);
        return view('kunjungan.edit')->with(compact('kunjungan', 'dokter', 'pasien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kunjungan = Kunjungan::find($id);
        $dokter = Dokter::whereIn('id', array($request->get('dokter_id')))->get();
        foreach ($dokter as $key => $value) {
            $poli = $value->poli;
        }
        $kunjungan->poli = $poli;
        $kunjungan->update($request->all());
        Session::flash("flash_notification", [
         "level"=>"success",
         "message"=>"<strong>Sukses! </strong> <strong>$kunjungan->no_kunjungan</strong> berhasil diupdate."
     ]);
        return redirect()->route('kunjungan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kunjungan = Kunjungan::find($id);
        $kunjungan->delete();
        Session::flash("flash_notification", [
       "level"=>"success",
       "message"=>"<strong>Sukses! </strong> <strong>$kunjungan->no_kunjungan</strong> berhasil dihapus."
   ]);
        return redirect()->route('kunjungan.index');
    }

    public function export()
    {
        return view('kunjungan.laporan');
    }

    public function exportPost(Request $request)
    {
        $awal = $request->get('awal');
        $akhir = $request->get('akhir');
        $kunjungans = Kunjungan::whereBetween('tgl_kunjungan', array($awal, $akhir))->orderBy('no_kunjungan')->get();
        $pdf = PDF::loadview('kunjungan.pdf', compact('kunjungans'))->setPaper('a4', 'landscape');
        return $pdf->stream('Laporan Kunjungan.pdf');
    }
}
