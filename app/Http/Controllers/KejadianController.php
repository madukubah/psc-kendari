<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KejadianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $kejadian = \App\Kejadian::with('puskesmas','rumkit','driver','ambulans')->paginate(10);
        return view('kejadian.index', ['kejadian'=> $kejadian]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("kejadian.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $new_kejadian = new \App\Kejadian();

        $new_kejadian->no_kejadian = $request->get('no_kejadian');
        $new_kejadian->pelapor = $request->get('pelapor');
        $new_kejadian->lokasi = $request->get('lokasi');
        $new_kejadian->telpon = $request->get('telpon');
        $new_kejadian->nama_korban = $request->get('nama_korban');
        $new_kejadian->jenis_kelamin = $request->get('jenis_kelamin');
        $new_kejadian->umur = $request->get('umur');
        $new_kejadian->jamkes = $request->get('jamkes');
        $new_kejadian->no_jamkes = $request->get('no_jamkes');
        $new_kejadian->pelapor = $request->get('pelapor');
        $new_kejadian->kategori = json_encode($request->get('kategori'));
        $new_kejadian->triage = $request->get('triage');
        $new_kejadian->diagnosa = $request->get('diagnosa');
        $new_kejadian->catatan = $request->get('catatan');
        $new_kejadian->triase = $request->get('triase');
        $new_kejadian->ambulans()->associate($request->get('ambulans'));
        $new_kejadian->driver()->associate($request->get('driver'));
        $new_kejadian->puskesmas()->associate($request->get('puskesmas'));
        $new_kejadian->rumkit()->associate($request->get('rumkit'));

        $new_kejadian->save();
        return redirect()->route('kejadian.create')->with('status', 'Laporan Kejadian Berhasil disubmit');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
