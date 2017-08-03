<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rekam;
use App\Dokter;
use App\Pasien;
use Auth;
use Session;
use PDF;
use DB;

class RekamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        $rekams = Rekam::where('no_rekam', 'LIKE', '%'.$q.'%')
                         ->orderBy('no_rekam')
                         ->paginate(10);
        return view('medis.index')->with(compact('q', 'rekams'));
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
        return view('medis.create')->with(compact('dokter', 'pasien'));
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
          'no_rekam'=>'required',
          'tgl_rekam'=>'required',
          'pasien_id'=>'required',
          'dokter_id'=>'required',
          'keluhan'=>'required',
          'diagnosa'=>'required',
          'theraphy'=>'required',
          'biaya'=>'required',
        ]);
        $data = $request->all();
        $dokter = Dokter::whereIn('id', array($request->get('dokter_id')))->get();
        foreach ($dokter as $key => $value) {
            $poli = $value->poli;
        }
        $pasien = Pasien::whereIn('id', array($request->get('pasien_id')))->get();
        foreach ($pasien as $key => $value) {
            $status = $value->status;
        }
        $data['poli'] = $poli;
        $data['status'] = $status;
        $data['user_id'] = Auth::user()->id;
        $rekam = Rekam::create($data);
        Session::flash("flash_notification", [
           "level"=>"success",
           "message"=>"<strong>Sukses! </strong> <strong>$rekam->no_rekam</strong> berhasil disimpan."
       ]);
        return redirect()->route('medis.index');
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
        $rekam = Rekam::findOrFail($id);
        return view('medis.edit')->with(compact('rekam', 'dokter', 'pasien'));
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
        $rekam = Rekam::find($id);
        $dokter = Dokter::whereIn('id', array($request->get('dokter_id')))->get();
        foreach ($dokter as $key => $value) {
            $poli = $value->poli;
        }
        $pasien = Pasien::whereIn('id', array($request->get('pasien_id')))->get();
        foreach ($pasien as $key => $value) {
            $status = $value->status;
        }
        $rekam->poli = $poli;
        $rekam->status = $status;
        $rekam->user_id = Auth::user()->id;
        $rekam->update($request->all());
        Session::flash("flash_notification", [
       "level"=>"success",
       "message"=>"<strong>Sukses! </strong> <strong>$rekam->no_rekam</strong> berhasil diupdate."
   ]);
        return redirect()->route('medis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rekam = Rekam::find($id);
        $rekam->delete();
        Session::flash("flash_notification", [
     "level"=>"success",
     "message"=>"<strong>Sukses! </strong> <strong>$rekam->no_rekam</strong> berhasil dihapus."
 ]);
        return redirect()->route('medis.index');
    }

    public function export()
    {
        return view('medis.laporan');
    }

    public function exportPost(Request $request)
    {
        $awal = $request->get('awal');
        $akhir = $request->get('akhir');
        $biaya = DB::table('rekams')
                 ->selectRaw('user_id, SUM(biaya) AS total')
                 ->whereBetween('tgl_rekam', array($awal, $akhir))
                 ->groupBy('user_id')
                 ->get();
        $rekams = Rekam::whereBetween('tgl_rekam', array($awal, $akhir))->orderBy('no_rekam')->get();
        $pdf = PDF::loadview('medis.pdf', compact('rekams', 'biaya'))->setPaper('a4', 'landscape');
        return $pdf->stream('Laporan Tindakan.pdf');
    }
}
