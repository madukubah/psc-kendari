@extends('adminlte::page')

@section('title', 'Buat Rumah Sakit')

@section("content")



        <div class="box box-success">
            <div class="box-header with-border"><h3 class="box-title">Buat Rumah Sakit</h3></div>
                <div class="box-body">
                    @if(session('status'))
                        <div class="callout callout-info">{{session('status')}}</div>
                    @endif
                    <div class="row">
<form enctype="multipart/form-data" action="{{route('rumkit.store')}}" method="POST">

@csrf
<div class="col-md-5">
        <label for="kode_rs">Kode RS</label>
        <input class="form-control" placeholder="RSXXX" type="text" name="kode_rs" id="kode_rs"/><br>

      <label for="nama_rs">Nama RS</label>
      <input class="form-control" placeholder="Rumah Sakit Xxxxx" type="text" name="nama_rs" id="nama_rs"/><br>

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

      <label for="tt_kelas_vip">Total Kelas VIP</label><br>
      <input type="number" class="form-control" id="tt_kelas_vip" name="tt_kelas_vip" min=0 value=0><br>

      <label for="tt_kelas_1">Total Kelas 1</label><br>
      <input type="number" class="form-control" id="tt_kelas_1" name="tt_kelas_1" min=0 value=0><br>
</div>

      <div class="col-md-4">

      <label for="tt_kelas_2">Total Kelas 2</label><br>
      <input type="number" class="form-control" id="tt_kelas_2" name="tt_kelas_2" min=0 value=0><br>

      <label for="tt_kelas_3">Total Kelas 3</label><br>
      <input type="number" class="form-control" id="tt_kelas_3" name="tt_kelas_3" min=0 value=0><br>

      <label for="igd">IGD</label><br>
      <input type="number" class="form-control" id="igd" name="igd" min=0 value=0><br>

      <label for="vk">VK</label><br>
      <input type="number" class="form-control" id="vk" name="vk" min=0 value=0><br>

      <label for="icu">ICU</label><br>
      <input type="number" class="form-control" id="icu" name="icu" min=0 value=0><br>

      <label for="iccu">ICCU</label><br>
      <input type="number" class="form-control" id="iccu" name="iccu" min=0 value=0><br>

      <label for="picu">PICU</label><br>
      <input type="number" class="form-control" id="picu" name="picu" min=0 value=0><br>

      <label for="nicu">NICU</label><br>
      <input type="number" class="form-control" id="nicu" name="nicu" min=0 value=0><br>

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
