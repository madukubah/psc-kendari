<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $driver = \App\Driver::with('puskesmas')->paginate(10);
        return view('driver.index', ['driver'=> $driver]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('driver.create');
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
        $validationConfig = [
            'puskesmas' => ['required'],
            'nama_driver' => ['required'],
            
        ];
        $request->validate( $validationConfig );

        $new_driver = new \App\Driver;

        $new_driver->nama_driver = $request->get('nama_driver');
        $new_driver->alamat = $request->get('alamat');
        $new_driver->telpon = $request->get('telpon');
        $new_driver->username = $request->get('username');
        $new_driver->password = \Hash::make($request->get('password'));
        $new_driver->email = $request->get('email');
        $new_driver->puskesmas()->associate($request->get('puskesmas'));

        $new_driver->save();
        return redirect()->route('driver.create')->with('status', 'Driver Berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = \App\Driver::findOrFail($id);
        return view('driver.show', ['driver' => $driver]);
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
        $driver = \App\Driver::findOrFail($id);
        return view('driver.edit', ['driver' => $driver]);
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
            'puskesmas' => ['required'],
            'nama_driver' => ['required'],
            
        ];
        $request->validate( $validationConfig );
        //
        $drivers = \App\Driver::findOrFail($id);

        $drivers->nama_driver = $request->get('nama_driver');
        $drivers->alamat = $request->get('alamat');
        $drivers->telpon = $request->get('telpon');
        $drivers->username = $request->get('username');

        if( $request->input('password') != NULL )
            $drivers->password = \Hash::make($request->get('password'));

        $drivers->email = $request->get('email');
        $drivers->puskesmas()->associate($request->get('puskesmas'));

        $drivers->save();

        return redirect()->route('driver.edit', ['id' => $id])->with('status', 'Driver berhasil diubah');
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
        $drivers = \App\Driver::findOrFail($id);
        // dd( count( $drivers->kejadian ) );die;
        if( count( $drivers->kejadian ) != 0 )
            return redirect()->route('driver.index')->with('status', 'Driver Gagal dihapus');

        $drivers->delete();
        return redirect()->route('driver.index')->with('status', 'Driver berhasil dihapus');
    }

    public function ajaxSearch(Request $request){
        $keyword = $request->get('q');
        $driver = \App\Driver::where("nama_driver", "LIKE", "%$keyword%")->get();
        return $driver;
    }

}
