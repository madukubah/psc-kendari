<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PuskesmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $puskesmas = \App\Puskesmas::paginate(10);
        $filterKeyword = $request->get('keyword');
        if($filterKeyword){
            $puskesmas = \App\Puskesmas::where('nama_puskesmas', 'LIKE', "%$filterKeyword%")->paginate(10);
        }
        return view('puskesmas.index', ['puskesmas' => $puskesmas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("puskesmas.create");
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
        $new_puskesmas = new \App\Puskesmas;

        $new_puskesmas->nama_puskesmas = $request->get('nama_puskesmas');
        $new_puskesmas->alamat = $request->get('alamat');
        $new_puskesmas->telpon = $request->get('telpon');
        $new_puskesmas->username = $request->get('username');
        $new_puskesmas->password = \Hash::make($request->get('password'));

        $new_puskesmas->save();

        return redirect()->route('puskesmas.create')->with('status', 'Puskesmas Berhasil dibuat.');
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
        $puskesmas = \App\Puskesmas::findOrFail($id);
        return view('puskesmas.show', ['puskesmas' => $puskesmas]);
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
        $puskesmas = \App\Puskesmas::findOrFail($id);
        return view('puskesmas.edit', ['puskesmas' => $puskesmas]);
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
        $puskesmas = \App\Puskesmas::findOrFail($id);

        $puskesmas->nama_puskesmas = $request->get('nama_puskesmas');
        $puskesmas->telpon = $request->get('telpon');
        $puskesmas->alamat = $request->get('alamat');

        $puskesmas->save();

        return redirect()->route('puskesmas.edit', ['id' => $id])->with('status', 'Puskesmas berhasil diubah');
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
        $puskesmas = \App\Puskesmas::findOrFail($id);
        $puskesmas->delete();
        return redirect()->route('puskesmas.index')->with('status', 'Puskesmas berhasil dihapus');
    }

    public function ajaxSearch(Request $request){
        $keyword = $request->get('q');
        $puskesmas = \App\Puskesmas::where("nama_puskesmas", "LIKE", "%$keyword%")->get();
        return $puskesmas;
    }
}
