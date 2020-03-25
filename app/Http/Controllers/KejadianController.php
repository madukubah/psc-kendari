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
        $filterKeyword = $request->get('keyword');
        if($filterKeyword){
            $kejadian = \App\Kejadian::where('pelapor', 'LIKE', "%$filterKeyword%")->paginate(10);
        }
        return view('kejadian.index', ['kejadian'=> $kejadian]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['no_reg'] = \App\Kejadian::latest('id')->first();
        // var_dump( $data['no_reg'] );die;
        if( $data['no_reg'] == NULL )
            $data['no_reg'] = 'PSCKDI-'.date('Y').'/'.str_pad( '1', 4, '0', STR_PAD_LEFT );
        else
            $data['no_reg'] = 'PSCKDI-'.date('Y').'/'.str_pad( $data['no_reg']->id+1, 4, '0', STR_PAD_LEFT );

        return view( "kejadian.create", $data );
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
            'ambulans' => ['required'],
            'driver' => ['required'],
            // 'puskesmas' => ['required'],
            // 'rumkit' => ['required'],

            'no_kejadian' => ['required'],
            // 'pelapor' => ['required'],
            // 'lokasi' => ['required'],
            // 'telpon' => ['required'],
            // 'nama_korban' => ['required'],
            // 'jenis_kelamin' => ['required'],
            // 'umur' => ['required'],
            // 'kategori' => ['required'],
            // 'triage' => ['required'],
            // 'triase' => ['required'],
            // 'no_jamkes' => ['required'],
        ];

        if( $request->get('puskesmas') == NULL && $request->get('rumkit') == NULL )
        {
            $validationConfig['puskesmas'] = ['required'];
            $validationConfig['rumkit'] = ['required'];
        }
        $request->validate( $validationConfig );
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
        $new_kejadian->kategori = ($request->get('kategori'));
        $new_kejadian->triage = $request->get('triage');
        $new_kejadian->diagnosa = $request->get('diagnosa');
        $new_kejadian->catatan = $request->get('catatan');
        $new_kejadian->triase = $request->get('triase');
        $new_kejadian->kejadian_keluhan = $request->get('kejadian_keluhan');
        $new_kejadian->ambulans()->associate($request->get('ambulans'));
        $new_kejadian->driver()->associate($request->get('driver'));
        $new_kejadian->puskesmas()->associate($request->get('puskesmas'));
        $new_kejadian->rumkit()->associate($request->get('rumkit'));
        $latlong = explode( ';', $request->get('latlong') );
        $new_kejadian->latitude = $latlong[0];
        $new_kejadian->longitude = $latlong[1];

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
        $kejadian = \App\Kejadian::findOrFail($id);
        return view('kejadian.show', ['kejadian' => $kejadian]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kejadian = \App\Kejadian::findOrFail($id);
        return view('kejadian.edit', ['kejadian' => $kejadian]);
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
            'ambulans' => ['required'],
            'driver' => ['required'],
            // 'puskesmas' => ['required'],
            // 'rumkit' => ['required'],

            'no_kejadian' => ['required'],
            // 'pelapor' => ['required'],
            // 'lokasi' => ['required'],
            // 'telpon' => ['required'],
            // 'nama_korban' => ['required'],
            // 'jenis_kelamin' => ['required'],
            // 'umur' => ['required'],
            // 'kategori' => ['required'],
            // 'triage' => ['required'],
            // 'triase' => ['required'],
            // 'no_jamkes' => ['required'],

        ];
        if( $request->get('puskesmas') == NULL && $request->get('rumkit') == NULL )
        {
            $validationConfig['puskesmas'] = ['required'];
            $validationConfig['rumkit'] = ['required'];
        }
        $request->validate( $validationConfig );
        //
        $kejadian = \App\Kejadian::findOrFail($id);

        $kejadian->no_kejadian = $request->get('no_kejadian');
        $kejadian->pelapor = $request->get('pelapor');
        $kejadian->lokasi = $request->get('lokasi');
        $kejadian->telpon = $request->get('telpon');
        $kejadian->nama_korban = $request->get('nama_korban');
        $kejadian->jenis_kelamin = $request->get('jenis_kelamin');
        $kejadian->umur = $request->get('umur');
        $kejadian->jamkes = $request->get('jamkes');
        $kejadian->no_jamkes = $request->get('no_jamkes');
        $kejadian->kategori = ($request->get('kategori'));
        $kejadian->triage = $request->get('triage');
        $kejadian->diagnosa = $request->get('diagnosa');
        $kejadian->catatan = $request->get('catatan');
        $kejadian->triase = $request->get('triase');
        $kejadian->kejadian_keluhan = $request->get('kejadian_keluhan');
        $kejadian->ambulans()->associate($request->get('ambulans'));
        $kejadian->driver()->associate($request->get('driver'));
        $kejadian->puskesmas()->associate($request->get('puskesmas'));
        $kejadian->rumkit()->associate($request->get('rumkit'));
        $latlong = explode( ';', $request->get('latlong') );
        $kejadian->latitude = $latlong[0];
        $kejadian->longitude = $latlong[1];

        $kejadian->save();
        return redirect()->route('kejadian.edit', $kejadian->id )->with('status', 'Laporan Kejadian Berhasil disubmit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kejadian = \App\Kejadian::findOrFail($id);
        $kejadian->delete();
        return redirect()->route('kejadian.index')->with('status', 'Rumah Sakit berhasil dihapus');
    }
}
