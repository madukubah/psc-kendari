@extends('adminlte::page')

@section('title', 'PSC KENDARI')

@section('content_header')
<style>
    #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
    }
</style>

<textarea id="puskesmas" style="display:none">
    <?= json_encode( $puskesmas );?>
</textarea>
<script>
    function initMap() {
        var puskesmas = JSON.parse( document.getElementById('puskesmas').innerHTML );

        var puskesmasLoc = new Array;
        var location = {lat: -3.981716, lng: 122.518213};
        var infowindow = new google.maps.InfoWindow();
        var map = new google.maps.Map(document.getElementById('map'), {zoom: 12, center: location});
        for( var i=0; i < puskesmas.length; i++ )
        {
            puskesmasLoc.push(
                {
                    position: {lat: puskesmas[i].latitude , lng: puskesmas[i].longitude }
                }
             );
            marker = new google.maps.Marker({
                position: {lat: puskesmas[i].latitude , lng: puskesmas[i].longitude },
                map: map
            });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent( '<b>' + puskesmas[i].nama_puskesmas + '</b>' );
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }
</script>

    <h1 style="text-align:center"><font color="green"><b>SELAMAT DATANG DI EMS (EMERGENCY MANAGEMENT SYSTEM)<br>PSC 119 DINAS KESEHATAN KOTA KENDARI</b></h1>
    <div  >
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Puskesmas</h3>
                    </div>
                    <div class="box-body" >
                        <div id="map"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('adminlte_js')
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6PVYkU3GvNrBUPsKDJ_dKf9Tjei_gDEk&callback=initMap">
    </script>
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
