@extends('adminlte::page')

@section('title', 'Tambah Kejadian')

@section("content")



        <div class="box box-success">
            <div class="box-header with-border"><h3 class="box-title">Tambah Kejadian</h3></div>
                <div class="box-body">
                    @if(session('status'))
                        <div class="callout callout-info">{{session('status')}}</div>
                    @endif
                    <div class="row">
<form enctype="multipart/form-data" action="{{route('kejadian.store')}}" method="POST">

@csrf
<div class="col-xs-6">
      <label for="no_kejadian">No. Register</label>
      <input class="form-control" placeholder="PSCKDI-YYYY/XXXXX" type="text" name="no_kejadian" id="no_kejadian"/><br>

      <label for="pelapor">Pelapor</label>
      <input class="form-control" placeholder="Nama Pelapor" type="text" name="pelapor" id="pelapor"/><br>

      <label for="lokasi">Lokasi Kejadian</label>
      <textarea name="lokasi" id="lokasi" class="form-control"></textarea><br>

      <label for="telpon">No. Telp/HP Yang Bisa dihubungi</label>
      <input class="form-control" placeholder="" type="text" name="telpon" id="telpon"/>
      <br>

      <label for="nama_korban">Nama Korban</label>
      <input class="form-control" placeholder="Nama Korban" type="text" name="nama_korban" id="nama_korban"/>
      <br>

      <label for="">Jenis Kelamin</label>
      <div class="radio icheck">
          <input type="radio" name="jenis_kelamin" id="PRIA" value="PRIA"> <label for="PRIA">PRIA</label>
          <input type="radio" name="jenis_kelamin" id="WANITA" value="WANITA"> <label for="WANITA">WANITA</label> <br>
        </div>

        <label for="umur">Umur</label>
        <input class="form-control" placeholder="umur" type="number" name="umur" id="umur"/>
        <br>

        <label for="">Jaminan Kesehatan</label>
      <div class="radio icheck">
          <input type="radio" name="jamkes" id="UMUM" value="UMUM"> <label for="UMUR">UMUM</label>
          <input type="radio" name="jamkes" id="BPJS" value="BPJS"> <label for="BPJS">BPJS</label> <br>
        </div>

        <label for="no_jamkes">No. Kartu</label>
        <input class="form-control" placeholder="No. Kartu" type="number" name="no_jamkes" id="no_jamkes"/>
        <br>
</div>
<div class="col-xs-6">


        <label for="">Kategori</label>
      <div class="radio icheck">
          <input type="radio" name="kategori[]" id="NONEMERGENCY" value="NONEMERGENCY"> <label for="NONEMERGENCY">NON EMERGENCY</label>
          <input type="radio" name="kategori[]" id="EMERGENCY" value="EMERGENCY"> <label for="EMERGENCY">EMERGENCY</label>
          <input type="radio" name="kategori[]" id="INFORMASI" value="INFORMASI"> <label for="INFORMASI">INFORMASI</label>
          <input type="radio" name="kategori[]" id="KRIMINAL" value="KRIMINAL"> <label for="KRIMINAL">KRIMINAL</label>
          <input type="radio" name="kategori[]" id="BENCANA" value="BENCANA"> <label for="BENCANA">BENCANA</label> <br>
          <input type="radio" name="kategori[]" id="LAINNYA" value="LAINNYA"> <label for="LAINNYA">LAINNYA</label> <br>
        </div>

        <label for="">Triage</label>
      <div class="radio icheck">
          <input type="radio" name="triage" id="M" value="M"> <label for="M">M</label>
          <input type="radio" name="triage" id="K" value="K"> <label for="K">K</label>
          <input type="radio" name="triage" id="H" value="H"> <label for="H">H</label>
          <input type="radio" name="triage" id="HT" value="HT"> <label for="HT">HT</label> <br>
        </div>

        <label for="diagnosa">Diagnosa Medis</label>
      <input class="form-control" placeholder="Diagnosa Medis" type="text" name="diagnosa" id="diagnosa"/><br>

      <label for="kejadian_keluhan">Kejadian / Keluhan Masyarakat</label>
      <textarea name="kejadian_keluhan" id="kejadian_keluhan" class="form-control"></textarea><br>

      <label for="catatan">Catatan</label>
      <textarea name="catatan" id="catatan" class="form-control"></textarea><br>

      <label for="">Triase</label>
      <div class="radio icheck">
          <input type="radio" name="triase" id="1" value="1"> <label for="1">1</label>
          <input type="radio" name="triase" id="2" value="2"> <label for="2">2</label>
          <input type="radio" name="triase" id="3" value="3"> <label for="3">3</label><br>
        </div>

        <label for="ambulans">Ambulans</label><br>
        <select name="ambulans" id="ambulans" class="form-control"></select><br><br/>

        <label for="driver">Driver</label><br>
        <select name="driver" id="driver" class="form-control"></select><br><br/>

        <label for="puskesmas">Puskesmas</label><br>
        <select name="puskesmas" id="puskesmas" class="form-control"></select><br><br/>

        <label for="rumkit">Rumah Sakit</label><br>
        <select name="rumkit" id="rumkit" class="form-control"></select><br><br/>

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

        $('#rumkit').select2({ajax: {url: 'https://psckendari.systems/ajax/rumkit/search',processResults: function(data){
            return {
                        results: data.map(function(item){return {id: item.id, text:item.nama_rs} })
                    }
            }
            }
        });

        $('#ambulans').select2({ajax: {url: 'https://psckendari.systems/ajax/ambulans/search',processResults: function(data){
            return {
                        results: data.map(function(item){return {id: item.id, text:item.no_plat} })
                    }
            }
            }
        });

        $('#driver').select2({ajax: {url: 'https://psckendari.systems/ajax/driver/search',processResults: function(data){
            return {
                        results: data.map(function(item){return {id: item.id, text:item.nama_driver} })
                    }
            }
            }
        });
    </script>


    @yield('js')
@stop
