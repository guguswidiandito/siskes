<?php

namespace App\Http\Controllers;

use App\Dokter;
use Session;

use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokters = Dokter::orderBy('no_dokter')->paginate(10);
        return view('dokter.index')->with(compact('dokters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokter.create');
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
          'no_dokter'=>'required|unique:dokters',
          'nama_dokter'=>'required',
          'no_telepon'=>'required',
          'alamat_dokter'=>'required',
          'poli'=>'required'
        ]);
        $dokter = Dokter::create($request->all());
        Session::flash("flash_notification", [
           "level"=>"success",
           "message"=>"<strong>Sukses! </strong> <strong>$dokter->nama_dokter</strong> berhasil disimpan."
       ]);
        return redirect()->route('dokter.index');
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
        $dokter = Dokter::findOrFail($id);
        return view('dokter.edit')->with(compact('dokter'));
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
        $dokter = Dokter::find($id);
        $dokter->update($request->all());
        Session::flash("flash_notification", [
           "level"=>"success",
           "message"=>"<strong>Sukses! </strong> <strong>$dokter->nama_dokter</strong> berhasil diupdate."
       ]);
        return redirect()->route('dokter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokter = Dokter::find($id);
        $dokter->delete();
        Session::flash("flash_notification", [
         "level"=>"success",
         "message"=>"<strong>Sukses! </strong> <strong>$dokter->nama_dokter</strong> berhasil dihapus."
     ]);
        return redirect()->route('dokter.index');
    }
}
