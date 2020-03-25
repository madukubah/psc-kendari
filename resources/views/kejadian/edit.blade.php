@extends('adminlte::page')

@section('title', 'Ubah Kejadian')

@section("content")
<style>
    #map {
        height: 500px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
    }
</style>
<script>
    function initMap() {
        var location = {lat: <?= (isset($kejadian->latitude)) ? $kejadian->latitude : -3.981716 ?>, lng: <?= (isset($kejadian->longitude)) ? $kejadian->longitude : 122.518213 ?>};
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
                        document.getElementById('lokasi').innerHTML = results[0].formatted_address;
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
    <div class="box-header with-border">
        <h3 class="box-title">Ubah Kejadian</h3></div>
    <div class="box-body">
        @if(session('status'))
        <div class="callout callout-info">{{session('status')}}</div>
        @endif
        <div class="row">
            <form enctype="multipart/form-data" action="{{route('kejadian.update', $kejadian->id )}}" method="POST">

                @csrf
                <input class="form-control" placeholder="latlong" type="hidden" name="_method" id="latlong" value="PUT" />
                <div class="col-xs-6">
                    <label for="no_kejadian">No. Register</label>
                    <input readonly value="{{ $kejadian->no_kejadian }}" class="form-control" placeholder="PSCKDI-YYYY/XXXXX" type="text" name="no_kejadian" id="no_kejadian" />
                    @error('no_kejadian')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>

                    <label for="pelapor">Pelapor</label>
                    <input value="{{ $kejadian->pelapor }}" class="form-control" placeholder="Nama Pelapor" type="text" name="pelapor" id="pelapor" />
                    @error('pelapor')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>

                    <label for="lokasi">Lokasi Kejadian</label>
                    <br>
                    <button data-toggle="modal" data-target="#gmap" type="button" class="btn btn-default btn-xs">Ambil Lokasi</button>

                    <input class="form-control" placeholder="latlong" type="hidden" name="latlong" id="latlong" value="-3.981716;122.518213" />
                    <textarea name="lokasi" id="lokasi" class="form-control">{{ $kejadian->lokasi }}</textarea>
                    @error('lokasi')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>

                    <label for="telpon">No. Telp/HP Yang Bisa dihubungi</label>
                    <input value="{{ $kejadian->telpon }}" class="form-control" placeholder="" type="text" name="telpon" id="telpon" />
                    @error('telpon')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>

                    <label for="nama_korban">Nama Korban</label>
                    <input value="{{ $kejadian->nama_korban }}" class="form-control" placeholder="Nama Korban" type="text" name="nama_korban" id="nama_korban" />
                    @error('nama_korban')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>

                    <label for="">Jenis Kelamin</label>
                    <div class="radio icheck">
                        <input type="radio" name="jenis_kelamin" id="PRIA" value="PRIA" <?= ( $kejadian->jenis_kelamin == 'PRIA' )? 'checked': '' ?> >
                        <label for="PRIA">PRIA</label>
                        <input type="radio" name="jenis_kelamin" id="WANITA" value="WANITA" <?= ( $kejadian->jenis_kelamin == 'WANITA' )? 'checked': '' ?> >
                        <label for="WANITA">WANITA</label>
                        <br>
                    </div>

                    <label for="umur">Umur</label>
                    <input value="{{ $kejadian->umur }}" class="form-control" placeholder="umur" type="number" name="umur" id="umur" />
                    @error('umur')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>

                    <label for="">Jaminan Kesehatan</label>
                    <div class="radio icheck">
                        <input type="radio" name="jamkes" id="UMUM" value="UMUM" <?= ( $kejadian->jamkes == 'UMUM' )? 'checked': '' ?>  >
                        <label for="UMUR">UMUM</label>
                        <input type="radio" name="jamkes" id="BPJS" value="BPJS" <?= ( $kejadian->jamkes == 'BPJS' )? 'checked': '' ?> >
                        <label for="BPJS">BPJS</label>
                        <br>
                    </div>

                    <label for="no_jamkes">No. Kartu</label>
                    <input value="{{ $kejadian->no_jamkes }}" class="form-control" placeholder="No. Kartu" type="number" name="no_jamkes" id="no_jamkes" />
                    @error('no_jamkes')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                </div>
                <div class="col-xs-6">

                    <label for="">Kategori</label>
                    <div class="radio icheck">
                        <input type="radio" name="kategori" id="NONEMERGENCY" value="NONEMERGENCY" <?= ( $kejadian->kategori == 'NONEMERGENCY' )? 'checked': '' ?> >
                        <label for="NONEMERGENCY">NON EMERGENCY</label>
                        <input type="radio" name="kategori" id="EMERGENCY" value="EMERGENCY" <?= ( $kejadian->kategori == 'EMERGENCY' )? 'checked': '' ?> >
                        <label for="EMERGENCY">EMERGENCY</label>
                        <input type="radio" name="kategori" id="INFORMASI" value="INFORMASI" <?= ( $kejadian->kategori == 'INFORMASI' )? 'checked': '' ?> >
                        <label for="INFORMASI">INFORMASI</label>
                        <input type="radio" name="kategori" id="KRIMINAL" value="KRIMINAL" <?= ( $kejadian->kategori == 'KRIMINAL' )? 'checked': '' ?> >
                        <label for="KRIMINAL">KRIMINAL</label>
                        <input type="radio" name="kategori" id="BENCANA" value="BENCANA" <?= ( $kejadian->kategori == 'BENCANA' )? 'checked': '' ?> >
                        <label for="BENCANA">BENCANA</label>
                        <br>
                        <input type="radio" name="kategori" id="LAINNYA" value="LAINNYA"  >
                        <label for="LAINNYA">LAINNYA</label>
                        <br>
                    </div>

                    <label for="">Triage</label>
                    <div class="radio icheck">
                        <input type="radio" name="triage" id="M" value="M" <?= ( $kejadian->triage == 'M' )? 'checked': '' ?> >
                        <label for="M">M</label>
                        <input type="radio" name="triage" id="K" value="K" <?= ( $kejadian->triage == 'K' )? 'checked': '' ?>>
                        <label for="K">K</label>
                        <input type="radio" name="triage" id="H" value="H" <?= ( $kejadian->triage == 'H' )? 'checked': '' ?> >
                        <label for="H">H</label>
                        <input type="radio" name="triage" id="HT" value="HT" <?= ( $kejadian->triage == 'HT' )? 'checked': '' ?>>
                        <label for="HT">HT</label>
                        <br>
                    </div>

                    <label for="diagnosa">Diagnosa Medis</label>
                    <input value="{{ $kejadian->diagnosa }}" class="form-control" placeholder="Diagnosa Medis" type="text" name="diagnosa" id="diagnosa" />
                    <br>

                    <label for="kejadian_keluhan">Kejadian / Keluhan Masyarakat</label>
                    <textarea name="kejadian_keluhan" id="kejadian_keluhan" class="form-control">{{ $kejadian->kejadian_keluhan }}</textarea>
                    <br>

                    <label for="catatan">Catatan</label>
                    <textarea name="catatan" id="catatan" class="form-control">{{ $kejadian->catatan }}</textarea>
                    <br>

                    <label for="">Triase</label>
                    <div class="radio icheck">
                        <input type="radio" name="triase" id="1" value="1" checked >
                        <label for="1">1</label>
                        <input type="radio" name="triase" id="2" value="2">
                        <label for="2">2</label>
                        <input type="radio" name="triase" id="3" value="3">
                        <label for="3">3</label>
                        <br>
                    </div>

                    <label for="ambulans">Ambulans</label>
                    <br>
                    <select name="ambulans" id="ambulans" class="form-control"></select>
                    @error('ambulans')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <br/>

                    <label for="driver">Driver</label>
                    <br>
                    <select name="driver" id="driver" class="form-control"></select>
                    @error('driver')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <br/>

                    <label for="puskesmas">Puskesmas</label>
                    <br>
                    <select name="puskesmas" id="puskesmas" class="form-control"></select>
                    @error('puskesmas')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <br/>

                    <label for="rumkit">Rumah Sakit</label>
                    <br>
                    <select name="rumkit" id="rumkit" class="form-control"></select>
                    @error('rumkit')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <br/>

                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    <br>
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
        $('#puskesmas').select2({ajax: {
            // url: 'https://psckendari.systems/ajax/puskesmas/search',
            url: '{{url("ajax/puskesmas/search")}}',
            processResults: function(data){
            return {
                        results: data.map(function(item){return {id: item.id, text:item.nama_puskesmas} })
                    }
            }
            }
        });

        $('#rumkit').select2({ajax: {
            // url: 'https://psckendari.systems/ajax/rumkit/search',
            url: '{{url("ajax/rumkit/search")}}',
            processResults: function(data){
            return {
                        results: data.map(function(item){return {id: item.id, text:item.nama_rs} })
                    }
            }
            }
        });

        $('#ambulans').select2({ajax: {
            // url: 'https://psckendari.systems/ajax/ambulans/search',
            url: '{{url("ajax/ambulans/search")}}',
            processResults: function(data){
            return {
                        results: data.map(function(item){return {id: item.id, text:item.no_plat} })
                    }
            }
            }
        });

        $('#driver').select2({ajax: {
            // url: 'https://psckendari.systems/ajax/driver/search',
            url: '{{url("ajax/driver/search")}}',
            processResults: function(data){
            return {
                        results: data.map(function(item){return {id: item.id, text:item.nama_driver} })
                    }
            }
            }
        });
    </script>
    <script>
        var puskesmas = <?= ( $kejadian->puskesmas != NULL ) ? $kejadian->puskesmas : '"-"' ?>;
        if( puskesmas != '-')
        {
            var option = new Option(puskesmas.nama_puskesmas, puskesmas.id, true, true);
            $('#puskesmas').append(option).trigger('change');
        }

        var ambulans = {!! $kejadian->ambulans !!}

        option = new Option(ambulans.no_plat, ambulans.id, true, true);
        $('#ambulans').append(option).trigger('change');

        var driver = {!! $kejadian->driver !!}

         option = new Option(driver.nama_driver, driver.id, true, true);
        $('#driver').append(option).trigger('change');

        var rumkit = <?= ( $kejadian->rumkit != NULL ) ? $kejadian->rumkit : '"-"' ?>;
        if( rumkit != '-')
        {
            option = new Option(rumkit.nama_rs, rumkit.id, true, true);
            $('#rumkit').append(option).trigger('change');
        }
        
    </script>


    @yield('js')
@stop
