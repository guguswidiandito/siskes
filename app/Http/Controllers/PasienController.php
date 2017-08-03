<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use Session;
use PDF;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        $pasien = Pasien::where('no_pasien', 'LIKE', '%'.$q.'%')
                          ->orWhere('nama_pasien', 'LIKE', '%'.$q.'%')
                          ->orderBy('nama_pasien')
                          ->paginate(10);
        return view('pasien.index')->with(compact('q', 'pasien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.create');
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
        'no_pasien'=>'required|unique:pasiens',
        'nama_pasien'=>'required',
        'alamat_pasien'=>'required',
        'tempat_lahir'=>'required',
        'tanggal_lahir'=>'required',
        'jenis_kelamin'=>'required',
        'status'=>'required',
        'gol_darah'=>'required',
        'agama'=>'required'
      ]);
        $pasien = Pasien::create($request->all());
        Session::flash("flash_notification", [
           "level"=>"success",
           "message"=>"<strong>Sukses! </strong> <strong>$pasien->nama_pasien</strong> berhasil disimpan."
       ]);
        return redirect()->route('pasien.index');
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
        $pasien = Pasien::findOrFail($id);
        return view('pasien.edit')->with(compact('pasien'));
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
        $pasien = Pasien::find($id);
        $pasien->update($request->all());
        Session::flash("flash_notification", [
           "level"=>"success",
           "message"=>"<strong>Sukses! </strong> <strong>$pasien->nama_pasien</strong> berhasil diupdate."
       ]);
        return redirect()->route('pasien.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::find($id);
        $pasien->delete();
        Session::flash("flash_notification", [
           "level"=>"success",
           "message"=>"<strong>Sukses! </strong> <strong>$pasien->nama_pasien</strong> berhasil dihapus."
       ]);
        return redirect()->route('pasien.index');
    }

    public function kartu($id)
    {
        $pasiens = Pasien::where('id', $id)->get();
        $pdf = PDF::loadview('pasien.kartu', compact('pasiens'))->setPaper('a4', 'landscape');
        return $pdf->stream('pasien.kartu');
    }
}
