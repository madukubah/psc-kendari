@extends('adminlte::page')

@section('title', 'Buat Puskesmas')

@section("content")

<div class="row">
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border"><h3 class="box-title">Buat Puskesmas</h3></div>
                <div class="box-body">
                    @if(session('status'))
                        <div class="callout callout-info">{{session('status')}}</div>
                    @endif

<form enctype="multipart/form-data" action="{{route('puskesmas.store')}}" method="POST">

@csrf
      <label for="nama_puskesmas">Nama Puskesmas</label>
      <input class="form-control" placeholder="Puskesmas Xxxxx" type="text" name="nama_puskesmas" id="nama_puskesmas"/><br>

      <label for="telpon">No. Telp</label>
      <input class="form-control" placeholder="08xxxxxx" type="text" name="telpon" id="telpon"/><br>

      <label for="alamat">Alamat</label>
      <textarea name="alamat" id="alamat" class="form-control"></textarea><br>

      <label for="username">Username</label>
      <input class="form-control" placeholder="Username" type="text" name="username" id="username"/>
      <br>

      <label for="password">Kata Sandi</label>
      <input class="form-control" placeholder="password" type="password" name="password" id="password"/>
      <br>

      <button type="submit" class="btn btn-success btn-sm">Simpan</button><br>
    </form>

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
