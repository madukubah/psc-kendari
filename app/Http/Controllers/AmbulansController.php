<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmbulansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ambulans = \App\Ambulans::with('puskesmas')->paginate(10);
        return view('ambulans.index', ['ambulans'=> $ambulans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ambulans.create');
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
        $new_ambulans = new \App\Ambulans();

        $new_ambulans->no_plat = $request->get('no_plat');
        $new_ambulans->telpon = $request->get('telpon');
        $new_ambulans->kelengkapan = $request->get('kelengkapan');
        $new_ambulans->puskesmas()->associate($request->get('puskesmas'));

        $new_ambulans->save();

        return redirect()->route('ambulans.create')->with('status', 'Ambulans Berhasil dibuat.');
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

    public function ajaxSearch(Request $request){
        $keyword = $request->get('q');
        $ambulans = \App\Ambulans::where("no_plat", "LIKE", "%$keyword%")->get();
        return $ambulans;
    }
}
