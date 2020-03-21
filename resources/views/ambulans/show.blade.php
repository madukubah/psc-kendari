@extends('adminlte::page')

@section('title', 'Detail ambulans')

@section("content")

<div class="row">
    <div class="col-md-8">
<div class="box box-success">
    <div class="box-header with-border"><h3 class="box-title">Detail ambulans</h3></div>
            <div class="box-body">
                        <div class="card">
                            <div class="card-body">
                                <b>Tempat Bertugas :</b><br/>{{$ambulans->puskesmas->nama_puskesmas}}<br><br>
                                <b>No. Plat :</b> <br>{{$ambulans->no_plat}}<br><br>
                                <b>No. Telp :</b> <br>{{$ambulans->telpon}}<br><br>
                                <b>Kelengkapan :</b><br>{{$ambulans->kelengkapan}}<br><br>
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
