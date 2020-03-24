<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RumkitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $rumkit = \App\Rumkit::paginate(10);
        $filterKeyword = $request->get('keyword');
        if($filterKeyword){
            $rumkit = \App\Rumkit::where('nama_rs', 'LIKE', "%$filterKeyword%")->paginate(10);
        }
        return view('rumkit.index', ['rumkit' => $rumkit]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view("rumkit.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationConfig = [
            'username' => ['required', 'string','max:255', 'unique:rumkit'],
            'kode_rs' => ['required', 'string','max:255', 'unique:rumkit'],
            'nama_rs' => ['required'],
        ];
        $request->validate( $validationConfig );
        //
        $new_rumkit = new \App\Rumkit;

        $new_rumkit->kode_rs = $request->get('kode_rs');
        $new_rumkit->nama_rs = $request->get('nama_rs');
        $new_rumkit->alamat = $request->get('alamat');
        $new_rumkit->telpon = $request->get('telpon');
        $new_rumkit->username = $request->get('username');
        $new_rumkit->password = \Hash::make($request->get('password'));
        $new_rumkit->tt_kelas_vip = $request->get('tt_kelas_vip');
        $new_rumkit->tt_kelas_1 = $request->get('tt_kelas_1');
        $new_rumkit->tt_kelas_2 = $request->get('tt_kelas_2');
        $new_rumkit->tt_kelas_3 = $request->get('tt_kelas_3');
        $new_rumkit->igd = $request->get('igd');
        $new_rumkit->vk = $request->get('vk');
        $new_rumkit->icu = $request->get('icu');
        $new_rumkit->iccu = $request->get('iccu');
        $new_rumkit->picu = $request->get('picu');
        $new_rumkit->nicu = $request->get('nicu');
        $latlong = explode( ';', $request->get('latlong') );
        $new_rumkit->latitude = $latlong[0];
        $new_rumkit->longitude = $latlong[1];
        $new_rumkit->save();
        // dd($new_rumkit);die;


        return redirect()->route('rumkit.create')->with('status', 'Rumah Sakit Berhasil dibuat.');
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
        $rumkit = \App\Rumkit::findOrFail($id);
        return view('rumkit.show', ['rumkit' => $rumkit]);
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
        $rumkit = \App\Rumkit::findOrFail($id);
        return view('rumkit.edit', ['rumkit' => $rumkit]);
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
        $validationConfig = [
            'nama_rs' => ['required'],
        ];
        $request->validate( $validationConfig );
        //
        $rumkit = \App\Rumkit::findOrFail($id);

        $rumkit->nama_rs = $request->get('nama_rs');
        $rumkit->telpon = $request->get('telpon');
        $rumkit->alamat = $request->get('alamat');
        $rumkit->tt_kelas_vip = $request->get('tt_kelas_vip');
        $rumkit->tt_kelas_1 = $request->get('tt_kelas_1');
        $rumkit->tt_kelas_2 = $request->get('tt_kelas_2');
        $rumkit->tt_kelas_3 = $request->get('tt_kelas_3');
        $rumkit->igd = $request->get('igd');
        $rumkit->vk = $request->get('vk');
        $rumkit->icu = $request->get('icu');
        $rumkit->iccu = $request->get('iccu');
        $rumkit->nicu = $request->get('nicu');
        $rumkit->picu = $request->get('picu');
        $latlong = explode( ';', $request->get('latlong') );
        $rumkit->latitude = $latlong[0];
        $rumkit->longitude = $latlong[1];

        $rumkit->save();

        return redirect()->route('rumkit.edit', ['id' => $id])->with('status', 'Rumah Sakit berhasil diubah');
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
        $rumkit = \App\Rumkit::findOrFail($id);

        if( count( $rumkit->kejadian ) != 0 )
            return redirect()->route('driver.index')->with('status', 'Rumah Sakit Gagal dihapus');

        $rumkit->delete();
        return redirect()->route('rumkit.index')->with('status', 'Rumah Sakit berhasil dihapus');
    }

    public function ajaxSearch(Request $request){
        $keyword = $request->get('q');
        $rumkit = \App\Rumkit::where("nama_rs", "LIKE", "%$keyword%")->get();
        return $rumkit;
    }
}