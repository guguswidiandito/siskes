<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obat;
use App\Resep;
use Session;
use PDF;
use App\DetailResep;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        $obats = Obat::where('kd_obat', 'LIKE', '%'.$q.'%')
                       ->orWhere('nama_obat', 'LIKE', '%'.$q.'%')
                       ->orderBy('kd_obat')
                       ->paginate(10);
        return view('obat.index')->with(compact('q', 'obats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat.create');
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
          'kd_obat'=>'required',
          'nama_obat'=>'required',
          'satuan'=>'required',
          'tgl_masuk'=>'required',
          'tgl_keluar'=>'required',
          'jumlah'=>'required'
        ]);
        $obat = Obat::create($request->all());
        Session::flash("flash_notification", [
           "level"=>"success",
           "message"=>"<strong>Sukses! </strong> <strong>$obat->nama_obat</strong> berhasil disimpan."
       ]);
        return redirect()->route('obat.index');
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
        $obat = Obat::findOrFail($id);
        return view('obat.edit')->with(compact('obat'));
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
        $jumlah = $request->get('jumlah');
        $obat = Obat::find($id);
        $obat->jumlah = $obat->jumlah+$jumlah;
        $data = $request->only('total_tersedia');
        $resep = DetailResep::where('obat_id', $id)->get();
        foreach ($resep as $key => $value) {
            $stok = 0 + $jumlah;
        }
        $data['total_tersedia'] = $stok;
        $obat->update();
        $obat->detailresep()->update($data);
        Session::flash("flash_notification", [
           "level"=>"success",
           "message"=>"<strong>Sukses! </strong> <strong>$obat->nama_obat</strong> berhasil diupdate."
       ]);
        return redirect()->route('obat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obat = Obat::find($id);
        $obat->delete();
        Session::flash("flash_notification", [
         "level"=>"success",
         "message"=>"<strong>Sukses! </strong> <strong>$obat->nama_obat</strong> berhasil dihapus."
     ]);
        return redirect()->route('obat.index');
    }

    public function export()
    {
        return view('obat.laporan');
    }

    public function exportPost(Request $request)
    {
        $awal = $request->get('awal');
        $akhir = $request->get('akhir');
        $obats = Obat::whereBetween('tgl_masuk', array($awal, $akhir))->orderBy('kd_obat')->get();
        $pdf = PDF::loadview('obat.pdf', compact('obats'))->setPaper('a4', 'landscape');
        return $pdf->stream('Laporan Pengeluaran Obat.pdf');
    }
}
