@extends('adminlte::page')

@section('title', 'Detail Rumah Sakit')

@section("content")

<div class="row">
    <div class="col-md-6">
<div class="box box-success">
    <div class="box-header with-border"><h3 class="box-title">Detail Rumah Sakit</h3></div>
            <div class="box-body">
                        <div class="card">
                            <div class="card-body">
                                <b>Rumah Sakit :</b><br/>{{$rumkit->nama_rs}}<br><br>
                                <b>No. Telp :</b> <br>{{$rumkit->telpon}}<br><br>
                                <b>Alamat :</b> <br>{{$rumkit->alamat}}<br><br>
                                <b>Username :</b><br>{{$rumkit->username}}<br><br>
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
