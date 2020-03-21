@extends('adminlte::page')

@section('title', 'Buat Ambulans')

@section("content")

<div class="row">
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border"><h3 class="box-title">Buat Ambulans</h3></div>
                <div class="box-body">
                    @if(session('status'))
                        <div class="callout callout-info">{{session('status')}}</div>
                    @endif

                    <form enctype="multipart/form-data" action="{{route('ambulans.update',$ambulans->id )}}" method="POST">
                        @csrf
                        <input type="hidden" value="PUT" name="_method">
                        <label for="no_plat">No. Plat</label>
                        <input value="{{$ambulans->no_plat}}" class="form-control" placeholder="DTXXXX" type="text" name="no_plat" id="no_plat"/><br>

                        <label for="telpon">No. Telp</label>
                        <input value="{{$ambulans->telpon}}" class="form-control" placeholder="08xxxxxx" type="text" name="telpon" id="telpon"/><br>

                        <label for="kelengkapan">Kelengkapan</label>
                        <textarea name="kelengkapan" id="kelengkapan" rows="5" class="form-control">{{$ambulans->kelengkapan}}</textarea><br>

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

    <script>
        $('#puskesmas').select2({ajax: {url: 'https://psckendari.systems/ajax/puskesmas/search',processResults: function(data){
            return {
                        results: data.map(function(item){return {id: item.id, text:item.nama_puskesmas} })
                    }
            }
            }
        });
    </script>


    @yield('js')
@stop
