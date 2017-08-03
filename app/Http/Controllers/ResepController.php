<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resep;
use App\Rekam;
use App\Obat;
use Auth;
use Session;
use PDF;
use App\DetailResep;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        $reseps = Resep::where('no_resep', 'LIKE', '%'.$q.'%')
                         ->orderBy('no_resep')
                         ->paginate(10);
        return view('resep.index')->with(compact('q', 'reseps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rekam = Rekam::pluck('no_rekam', 'id');
        return view('resep.create')->with(compact('rekam'));
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
           'no_resep'=>'required|unique:reseps',
           'tgl_resep'=>'required',
           'rekam_id'=>'required'
     ]);
        $jumlah = $request->get('jumlah');
        $data = $request->all();
        $rekam = Rekam::whereIn('id', array($request->get('rekam_id')))->get();
        foreach ($rekam as $key => $value) {
            $dokter = $value->dokter->id;
            $pasien = $value->pasien->id;
        }
        // $obat = Obat::whereIn('id', array($request->get('obat_id')))->get();
        // foreach ($obat as $key => $value) {
        //     $stok = $value->stock;
        //     if ($stok < $jumlah) {
        //         $kekurangan = $jumlah-$stok;
        //         $tersedia = 0;
        //     } else {
        //         $kekurangan = 0;
        //         $tersedia = $stok-$jumlah;
        //     }
        // }

        $data['dokter_id'] = $dokter;
        $data['user_id'] = Auth::user()->id;
        $data['pasien_id'] = $pasien;
        // $data['kekurangan'] = $kekurangan;
        // $data['total_tersedia'] = $tersedia;
        $resep = Resep::create($data);
        Session::flash("flash_notification", [
           "level"=>"success",
           "message"=>"<strong>Sukses! </strong> <strong>$resep->no_resep</strong> berhasil disimpan."
       ]);
        return redirect()->route('resep.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resep = Resep::find($id);
        $obat = Obat::pluck('nama_obat', 'id');
        $detailreseps = DetailResep::where('resep_id', $id)->orderBy('obat_id')->get();
        return view('resep.show')->with(compact('detailreseps', 'obat', 'resep'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rekam = Rekam::pluck('no_rekam', 'id');
        $resep = Resep::find($id);
        return view('resep.edit')->with(compact('resep', 'rekam'));
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
        $resep = Resep::find($id);
        $resep->update($request->all());
        Session::flash("flash_notification", [
           "level"=>"success",
           "message"=>"<strong>Sukses! </strong> <strong>$resep->no_resep</strong> berhasil diupdate."
       ]);
        return redirect()->route('resep.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resep = Resep::find($id);
        $resep->delete();
        Session::flash("flash_notification", [
         "level"=>"success",
         "message"=>"<strong>Sukses! </strong> <strong>$resep->no_resep</strong> berhasil dihapus."
     ]);
        return redirect()->route('resep.index');
    }

    public function cetakResep($id)
    {
        $detailreseps = DetailResep::where('resep_id', $id)->get();
        $pdf = PDF::loadview('resep.pdf', compact('detailreseps'))->setPaper('a4', 'landscape');
        return $pdf->stream('resep.pdf');
    }

    public function obat(Request $request)
    {
        $this->validate($request ,[
                'obat_id'=>'required',
                'jumlah'=>'required',
                'aturan_pakai'=>'required'
            ]);
        $jumlah = $request->get('jumlah');
        $data = $request->all();
        $obat = Obat::whereIn('id', array($request->get('obat_id')))->get();
        foreach ($obat as $key => $value) {
            $stok = $value->stock;
            if ($stok < $jumlah) {
                $kekurangan = $jumlah-$stok;
                $tersedia = 0;
            } else {
                $kekurangan = 0;
                $tersedia = $stok-$jumlah;
            }
        }
        $data['kekurangan'] = $kekurangan;
        $data['total_tersedia'] = $tersedia;
        $obats = DetailResep::create($data);
        Session::flash("flash_notification", [
         "level"=>"success",
         "message"=>"<strong>Sukses! obat berhasil ditambahkan."
        ]);
        return redirect()->back();
    }
}
