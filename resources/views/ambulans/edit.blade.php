@extends('adminlte::page')

@section('title', 'Ubah Driver')

@section("content")

<div class="row">
        <div class="col-md-8">
<div class="box box-success">
    <div class="box-header with-border"><h3 class="box-title">Ubah Driver</h3></div>
        <div class="box-body">
                @if(session('status'))
                    <div class="callout callout-info">{{session('status')}}</div>
                @endif
                <form enctype="multipart/form-data" action="{{route('driver.update', ['id'=>$driver->id])}}" method="POST">
                    @csrf
                    <input type="hidden" value="PUT" name="_method">

                    <label for="puskesmas">Tempat Bertugas</label><br>
                    <select name="puskesmas" id="puskesmas" class="form-control"></select><br><br/>

                      <label for="nama_driver">Nama Driver</label>
                      <input value="{{$driver->nama_driver}}" class="form-control" placeholder="Nama Lengkap" type="text" name="nama_driver" id="nama_driver"/><br>

                      <label for="telpon">No. Telp</label>
                      <input value="{{$driver->telpon}}" class="form-control" placeholder="08xxxxxx" type="text" name="telpon" id="telpon"/><br>

                      <label for="alamat">Alamat</label>
                      <textarea name="alamat" id="alamat" class="form-control">{{$driver->alamat}}</textarea><br>

                      <label for="username">Username</label>
                      <input value="{{$driver->username}}" class="form-control" placeholder="Username" type="text" name="username" id="username"/>
                      <br>

                      <label for="password">Kata Sandi</label>
                      <input value="{{$driver->password}}" class="form-control" placeholder="password" type="password" name="password" id="password"/>
                      <br>

                      <label for="email">Email</label>
                      <input value="{{$driver->email}}" class="form-control" placeholder="user@mail.com" type="text" name="email" id="email"/>
                      <br>

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

<script>
    $('#puskesmas').select2({
        ajax: {
            url: 'https://psckendari.systems/ajax/puskesmas/search',processResults: function(data){
                return {
                    results: data.map(function(item){return {id: item.id, text:item.nama_puskesmas} })
                }
            }
        }
    });

    var puskesmas = {!! $driver->puskesmas !!}

        var option = new Option(puskesmas.nama_puskesmas, puskesmas.id, true, true);
        $('#puskesmas').append(option).trigger('change');

</script>
    @yield('js')
@stop
