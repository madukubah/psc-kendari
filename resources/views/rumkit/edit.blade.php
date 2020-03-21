@extends('adminlte::page')

@section('title', 'Ubah Rumah Sakit')

@section("content")
<style>
    #map {
        height: 500px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
    }
</style>
<script>
    function initMap() {
        var location = {lat: <?= (isset($rumkit->latitude)) ? $rumkit->latitude : -3.981716 ?>, lng: <?= (isset($rumkit->longitude)) ? $rumkit->longitude : 122.518213 ?>};
        var marker = new google.maps.Marker({position: location});
        var geocoder = new google.maps.Geocoder;


        var map = new google.maps.Map(document.getElementById('map'), {zoom: 15, center: location});
        marker.setMap(map);

        new google.maps.event.addListener(map, 'click', function( event ){
            marker.setMap(null);

            location = {lat: event.latLng.lat(), lng:  event.latLng.lng() };
            marker = new google.maps.Marker({position: location});
            marker.setMap(map);
            document.getElementById('latlong').value = ""+event.latLng.lat() + ";" + event.latLng.lng();

            geocoder.geocode({'location': location}, function(results, status) {
                console.log( results );
                if (status === 'OK') {
                    if (results[0]) {
                        document.getElementById('alamat').innerHTML = results[0].formatted_address;
                    } else {
                    window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });


        });
    }
</script>
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
                    <div class="col-md-6">

                        <label for="kode_rs">Kode RS</label>
                        <input value="{{$rumkit->kode_rs}}" class="form-control" placeholder="RSXXX" type="text" name="kode_rs" id="kode_rs" disabled/>
                         @error('kode_rs')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <label for="nama_rs">Nama RS</label>
                        <input value="{{$rumkit->nama_rs}}" class="form-control" placeholder="Rumah Sakit Xxxx" type="text" name="nama_rs" id="nama_rs"/>
                         @error('nama_rs')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>

                        <label for="telpon">No. Telpon</label>
                        <input value="{{$rumkit->telpon}}" class="form-control" placeholder="08xxxxx" type="text" name="telpon" id="telpon"/><br>

                        <label for="alamat">Alamat</label><br>

                        <button data-toggle="modal" data-target="#gmap" type="button" class="btn btn-default btn-xs">Ambil Alamat</button>
                        <input class="form-control" placeholder="latlong" type="hidden" name="latlong" id="latlong" value="-3.981716;122.518213" />
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
                    <div class="col-md-6">

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
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6PVYkU3GvNrBUPsKDJ_dKf9Tjei_gDEk&callback=initMap">
    </script>
    <div class="modal fade" id="gmap" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
    {{--  --}}
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
