@extends('adminlte::page')

@section('title', 'Ubah Puskesmas')

@section("content")

<div class="row">
        <div class="col-md-8">
<div class="box box-success">
    <div class="box-header with-border"><h3 class="box-title">Ubah Puskesmas</h3></div>
        <div class="box-body">
                @if(session('status'))
                    <div class="callout callout-info">{{session('status')}}</div>
                @endif
                <form enctype="multipart/form-data" action="{{route('puskesmas.update', ['id'=>$puskesmas->id])}}" method="POST">
                    @csrf
                    <input type="hidden" value="PUT" name="_method">

                        <label for="nama_puskesmas">Nama Puskesmas</label>
                        <input value="{{$puskesmas->nama_puskesmas}}" class="form-control" placeholder="Puskesmas Xxxx" type="text" name="nama_puskesmas" id="nama_puskesmas"/><br>

                        <label for="telpon">No. Telpon</label>
                        <input value="{{$puskesmas->telpon}}" class="form-control" placeholder="08xxxxx" type="text" name="telpon" id="telpon"/><br>

                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control">{{$puskesmas->alamat}}</textarea><br>

                        <!-- <label for="password">Kata Sandi</label>
                        <input class="form-control" placeholder="password" type="password" name="password" id="password"/><br>

                        <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                        <input class="form-control" placeholder="password confirmation" type="password" name="password_confirmation" id="password_confirmation"/><br>-->
                        <div class="row">
                        <div class="col-xs-1">
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button><br></div></div>
                </form>
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
