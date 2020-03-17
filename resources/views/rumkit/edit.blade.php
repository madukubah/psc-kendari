@extends('adminlte::page')

@section('title', 'Ubah Rumah Sakit')

@section("content")

<div class="box box-success">
    <div class="box-header with-border"><h3 class="box-title">Ubah Rumah Sakit</h3></div>
        <div class="box-body">
                @if(session('status'))
                    <div class="callout callout-info">{{session('status')}}</div>
                @endif
                <div class="row">
                <form enctype="multipart/form-data" action="{{route('rumkit.update', ['id'=>$rumkit->id])}}" method="POST">
                    @csrf
                    <input type="hidden" value="PUT" name="_method">
                    <div class="col-md-5">

                    <label for="kode_rs">Kode RS</label>
                    <input value="{{$rumkit->kode_rs}}" class="form-control" placeholder="RSXXX" type="text" name="kode_rs" id="kode_rs" disabled/><br>

                        <label for="nama_rs">Nama RS</label>
                        <input value="{{$rumkit->nama_rs}}" class="form-control" placeholder="Rumah Sakit Xxxx" type="text" name="nama_rs" id="nama_rs"/><br>

                        <label for="telpon">No. Telpon</label>
                        <input value="{{$rumkit->telpon}}" class="form-control" placeholder="08xxxxx" type="text" name="telpon" id="telpon"/><br>

                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control">{{$rumkit->alamat}}</textarea><br>

                        <label for="tt_kelas_vip">T. Kelas VIP</label>
                        <input value="{{$rumkit->tt_kelas_vip}}" class="form-control" type="number" name="tt_kelas_vip" id="tt_kelas_vip"/><br>

                        <label for="tt_kelas_1">T. Kelas 1</label>
                        <input value="{{$rumkit->tt_kelas_1}}" class="form-control" type="number" name="tt_kelas_1" id="tt_kelas_1"/><br>

                        <label for="tt_kelas_2">T. Kelas 2</label>
                        <input value="{{$rumkit->tt_kelas_2}}" class="form-control" type="number" name="tt_kelas_2" id="tt_kelas_2"/><br>

                        <label for="tt_kelas_3">T. Kelas 3</label>
                        <input value="{{$rumkit->tt_kelas_3}}" class="form-control" type="number" name="tt_kelas_3" id="tt_kelas_3"/><br>


                    </div>
                    <div class="col-md-4">

                            <label for="igd">IGD</label>
                            <input value="{{$rumkit->igd}}" class="form-control" type="number" name="igd" id="igd"/><br>

                            <label for="vk">VK</label>
                            <input value="{{$rumkit->vk}}" class="form-control" type="number" name="vk" id="vk"/><br>

                            <label for="icu">ICU</label>
                            <input value="{{$rumkit->icu}}" class="form-control" type="number" name="icu" id="icu"/><br>

                            <label for="iccu">ICCU</label>
                            <input value="{{$rumkit->iccu}}" class="form-control" type="number" name="iccu" id="iccu"/><br>

                            <label for="picu">PICU</label>
                            <input value="{{$rumkit->picu}}" class="form-control" type="number" name="picu" id="picu"/><br>

                            <label for="nicu">NICU</label>
                            <input value="{{$rumkit->nicu}}" class="form-control" type="number" name="nicu" id="nicu"/><br>

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
