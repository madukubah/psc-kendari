@extends('adminlte::page')

@section('title', 'Buat Puskesmas')

@section("content")
<style>
    #map {
        height: 500px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
    }
</style>
<script>
    function initMap() {
        var location = {lat: -3.981716, lng: 122.518213};
        var marker = new google.maps.Marker({position: location});
        var geocoder = new google.maps.Geocoder;


        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 15, center: location});
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
                        <input class="form-control" placeholder="Puskesmas Xxxxx" type="text" name="nama_puskesmas" id="nama_puskesmas"/>
                        @error('nama_puskesmas')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>

                        <label for="telpon">No. Telp</label>
                        <input class="form-control" placeholder="08xxxxxx" type="text" name="telpon" id="telpon"/><br>

                        <label for="alamat">Alamat</label>
                        <br>
                        <button data-toggle="modal" data-target="#gmap" type="button" class="btn btn-default btn-xs">Ambil Alamat</button>

                        <input class="form-control" placeholder="latlong" type="hidden" name="latlong" id="latlong" value="-3.981716;122.518213" />
                        <textarea name="alamat" id="alamat" class="form-control"></textarea><br>

                        <label for="username">Username</label>
                        <input class="form-control" placeholder="Username" type="text" name="username" id="username"/>
                        @error('username')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
