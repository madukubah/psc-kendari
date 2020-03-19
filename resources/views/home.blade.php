@extends('adminlte::page')

@section('title', 'PSC KENDARI')

@section('content_header')
    <style>
        #map {
            height: 100%;  /* The height is 400 pixels */
            width: 100%;  /* The width is the width of the web page */
        }
    </style>
    <h1 style="text-align:center"><font color="green"><b>SELAMAT DATANG DI EMS (EMERGENCY MANAGEMENT SYSTEM)<br>PSC 119 DINAS KESEHATAN KOTA KENDARI</b></h1>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <p><a data-toggle="modal" data-target="#gmap"><b>map</b></a></p>
    <script>
        function initMap() {
            var location = {lat: -3.981716, lng: 122.518213};
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 20, center: location});
            var marker = new google.maps.Marker({position: location, map: map});
        }
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6PVYkU3GvNrBUPsKDJ_dKf9Tjei_gDEk&callback=initMap">
    </script>
    <div class="modal fade" id="gmap" role="dialog">
        <div class="modal-dialog  ">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')

@stop
