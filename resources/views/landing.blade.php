<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
    @yield('title', config('adminlte.title', 'AdminLTE 2'))
    @yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/skins/_all-skins.min.css') }}">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav">
<div class="wrapper">
<!--  -->
<style>
    #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
    }
</style>

<textarea id="puskesmas" style="display:none">
    <?= json_encode( $puskesmas );?>
</textarea>
<textarea id="rumkit" style="display:none">
    <?= json_encode( $rumkit );?>
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

        var rumkit = JSON.parse( document.getElementById('rumkit').innerHTML );
        for( var i=0; i < rumkit.length; i++ )
        {
            marker = new google.maps.Marker({
                position: {lat: rumkit[i].latitude , lng: rumkit[i].longitude },
                map: map
            });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent( '<b>' + rumkit[i].nama_rs + '</b>' );
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }
</script>
<!--  -->
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{ url('/') }}" class="navbar-brand">{!! config('adminlte.logo', '<b>A</b>LT') !!}</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li>
                <a href="{{ url('/login') }}">
                    <i class="fa fa-fw fa-circle"></i> Login
                </a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
            Informasi Puskesmas Dan Rumah Sakit 
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
              <div class="col-md-12">
                  <div class="box box-success">
                      <!-- <div class="box-header with-border">
                          <h3 class="box-title">Data Puskesmas</h3>
                      </div> -->
                      <div class="box-body" >
                          <div id="map"></div>
                      </div>

                  </div>
              </div>
          </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.18
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6PVYkU3GvNrBUPsKDJ_dKf9Tjei_gDEk&callback=initMap">
</script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
</body>
</html>
