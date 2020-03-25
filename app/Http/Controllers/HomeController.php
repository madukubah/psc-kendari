<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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

        $kejadian_by_umur  = DB::table('kejadian')->selectRaw("
            case
            when umur between  0 and  9 then '0-9'
            when umur between 10 and 19 then '10-19'
            when umur between 20 and 29 then '20-29'
            when umur between 30 and 39 then '30-39'
            when umur between 40 and 49 then '40-49'
            else '>= 50'
            end as _range
        ");


        $data['kejadian_by_umur'] =  DB::table( DB::raw("({$kejadian_by_umur->toSql()}) kejadian ") )
        ->mergeBindings($kejadian_by_umur )
        ->selectRaw('   
            kejadian._range,
            count(*) as _count
        ')->orderBy('kejadian._range', 'ASC')->groupBy('kejadian._range')->pluck('_count', '_range');

        $data['kejadian_by_triage'] = \App\Kejadian::
                                    selectRaw('   
                                        kejadian.triage,
                                        count(*) as _count
                                    ')->groupBy('kejadian.triage')->pluck('_count', 'triage');
        return view('home', $data);
    }
}
