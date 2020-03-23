<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['puskesmas_count'] = \App\Puskesmas::count();#->pluck( 'id', 'latitude', 'longitude' );
        $data['rumkit_count'] = \App\Rumkit::count();#->pluck( 'id', 'latitude', 'longitude' );
        $data['ambulans_count'] = \App\Ambulans::count();#->pluck( 'id', 'latitude', 'longitude' );
        $data['kejadian_count'] = \App\Kejadian::count();#->pluck( 'id', 'latitude', 'longitude' );
        $data['kejadian_by_jenis_kelamin'] = \App\Kejadian::where('jenis_kelamin', 'PRIA')->count();

        $data['kejadian_by_kategori']['NONEMERGENCY'] = \App\Kejadian::where('kategori', 'NONEMERGENCY')->count();
        $data['kejadian_by_kategori']['EMERGENCY'] = \App\Kejadian::where('kategori', 'EMERGENCY')->count();
        $data['kejadian_by_kategori']['INFORMASI'] = \App\Kejadian::where('kategori', 'INFORMASI')->count();
        $data['kejadian_by_kategori']['KRIMINAL'] = \App\Kejadian::where('kategori', 'KRIMINAL')->count();
        $data['kejadian_by_kategori']['BENCANA'] = \App\Kejadian::where('kategori', 'BENCANA')->count();
        $data['kejadian_by_kategori']['LAINNYA'] = \App\Kejadian::where('kategori', 'LAINNYA')->count();

        return view('home', $data);
    }
}
