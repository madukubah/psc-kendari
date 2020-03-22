@extends('adminlte::page')

@section('title', 'Detail driver')

@section("content")

<div class="row">
    <div class="col-md-8">
<div class="box box-success">
    <div class="box-header with-border"><h3 class="box-title">Detail driver</h3></div>
            <div class="box-body">
                        <div class="card">
                            <div class="card-body">
                                <b>Nama driver :</b><br/>{{$driver->nama_driver}}<br><br>
                                <b>No. Telp :</b> <br>{{$driver->telpon}}<br><br>
                                <b>Alamat :</b> <br>{{$driver->alamat}}<br><br>
                                <b>Username :</b><br>{{$driver->username}}<br><br>
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
