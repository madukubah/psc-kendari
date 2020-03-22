@extends('adminlte::page')

@section('title', 'Detail kejadian')

@section("content")

<div class="row">
    <div class="col-md-12">
<div class="box box-success">
    <div class="box-header with-border"><h3 class="box-title">Detail kejadian</h3></div>
            <div class="box-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row" >
                                    <div class="col-md-6">
                                        <b>No. Register :</b><br/>{{$kejadian->no_kejadian}}<br><br>
                                        <b>Pelapor :</b> <br>{{$kejadian->pelapor}}<br><br>
                                        <b>Lokasi Kejadian :</b> <br>{{$kejadian->lokasi}}<br><br>
                                        <b>No. Telp/HP Yang Bisa dihubungi :</b><br>{{$kejadian->telpon}}<br><br>
                                        <b>Nama Korban :</b><br>{{$kejadian->nama_korban}}<br><br>
                                        <b>Jenis Kelamin :</b><br>{{$kejadian->jenis_kelamin}}<br><br>
                                        <b>Umur :</b><br>{{$kejadian->umur}}<br><br>
                                        <b>Jaminan Kesehatan :</b><br>{{$kejadian->jamkes}}<br><br>
                                        <b>No. Kartu :</b><br>{{$kejadian->no_jamkes}}<br><br>
                                        <b>Kategori :</b><br>{{$kejadian->kategori}}<br><br>
                                        <b>Triage :</b><br>{{$kejadian->triage}}<br><br>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Diagnosa Medis :</b><br>{{$kejadian->diagnosa}}<br><br>
                                        <b>Kejadian / Keluhan Masyarakat :</b><br>{{$kejadian->kejadian_keluhan}}<br><br>
                                        <b>Catatan :</b><br>{{$kejadian->catatan}}<br><br>
                                        <b>Triase :</b><br>{{$kejadian->triase}}<br><br>
                                        <b>Ambulans :</b><br>{{$kejadian->ambulans->no_plat}}<br><br>
                                        <b>Driver :</b><br>{{$kejadian->driver->nama_driver}}<br><br>
                                        <b>Puskesmas :</b><br>{{$kejadian->puskesmas->nama_puskesmas}}<br><br>
                                        <b>Rumah Sakit :</b><br>{{$kejadian->rumkit->nama_rs}}<br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green',
                increaseArea: '20%' // optional
            });
        });
    </script>
    @yield('js')
@stop
