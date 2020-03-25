@extends('adminlte::page')

@section('title', 'PSC KENDARI')

@section('content_header')
    <h1 style="text-align:center"><font color="green"><b>SELAMAT DATANG DI EMS (EMERGENCY MANAGEMENT SYSTEM)<br>PSC 119 DINAS KESEHATAN KOTA KENDARI</b></font></h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $puskesmas_count }}</h3>

                    <p>Jumlah Puskesmas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-medkit"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ $rumkit_count }}</h3>

                <p>Rumah Sakit</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ $ambulans_count }}</h3>

                <p>Ambulans</p>
            </div>
            <div class="icon">
                <i class="ion ion-model-s"></i>
            </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <h3 ><font color="green"> Data Kejadian </h3>
    <div class="row">
        <div class="col-md-6">
          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Berdasarkan Jenis Kelamin</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                <center>
                    <canvas id="pieChart" style="height: 200px;" height="200"></canvas>
                </center>
              <h5><b>Pria : <?= $kejadian_by_jenis_kelamin ?></b></h5>
              <h5><b>Wanita : <?= $kejadian_count - $kejadian_by_jenis_kelamin ?></b></h5>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <div class="col-md-6">
          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Berdasarkan Kategori</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                <center>
                    <canvas id="pieChartkategori" style="height: 175px;" height="175"></canvas>
                </center>
                <div class="row">
                    <div class="col-md-6">
                        <h5><b>NON EMERGENCY : <?= $kejadian_by_kategori['NONEMERGENCY'] ?></b></h5>
                        <h5><b>EMERGENCY : <?= $kejadian_by_kategori['EMERGENCY'] ?></b></h5>
                        <h5><b>INFORMASI : <?= $kejadian_by_kategori['INFORMASI'] ?></b></h5>
                    </div>
                    <div class="col-md-6">
                        <h5><b>KRIMINAL : <?= $kejadian_by_kategori['KRIMINAL'] ?></b></h5>
                        <h5><b>BENCANA : <?= $kejadian_by_kategori['BENCANA'] ?></b></h5>
                        <h5><b>LAINNYA : <?= $kejadian_by_kategori['LAINNYA'] ?></b></h5>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <div class="col-md-6">
          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Berdasarkan Umur</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                <center>
                    <canvas id="pieChartUmur" style="height: 175px;" height="175"></canvas>
                </center>
                <div class="row">
                    <div class="col-md-6">
                        <h5><b>0-9 : <?= ( isset( $kejadian_by_umur['0-9'] ) ) ? $kejadian_by_umur['0-9'] : 0 ?></b></h5>
                        <h5><b>10-19 : <?= ( isset( $kejadian_by_umur['10-19'] ) ) ? $kejadian_by_umur['10-19'] : 0 ?></b></h5>
                        <h5><b>20-29 : <?= ( isset( $kejadian_by_umur['20-29'] ) ) ? $kejadian_by_umur['20-29'] : 0 ?></b></h5>
                    </div>
                    <div class="col-md-6">
                        <h5><b>30-39 : <?= ( isset( $kejadian_by_umur['30-39'] ) ) ? $kejadian_by_umur['30-39'] : 0 ?></b></h5>
                        <h5><b>40-49 : <?= ( isset( $kejadian_by_umur['40-49'] ) ) ? $kejadian_by_umur['40-49'] : 0 ?></b></h5>
                        <h5><b>>= 50 : <?= ( isset( $kejadian_by_umur['>= 50'] ) ) ? $kejadian_by_umur['>= 50'] : 0 ?></b></h5>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <div class="col-md-6">
          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Berdasarkan Umur</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                <center>
                    <canvas id="pieChartTriage" style="height: 175px;" height="175"></canvas>
                </center>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                            // dd( $kejadian_by_triage['M'] ); die;
                        ?>
                        <h5><b>M : <?= ( isset( $kejadian_by_triage['M'] ) ) ? $kejadian_by_triage['M'] : 0 ?></b></h5>
                        <h5><b>K : <?= ( isset( $kejadian_by_triage['K'] ) ) ? $kejadian_by_triage['K'] : 0 ?></b></h5>
                        <h5><b>H : <?= ( isset( $kejadian_by_triage['H'] ) ) ? $kejadian_by_triage['H'] : 0 ?></b></h5>
                    </div>
                    <div class="col-md-6">
                        <h5><b>HT : <?= ( isset( $kejadian_by_triage['HT'] ) ) ? $kejadian_by_triage['HT'] : 0 ?></b></h5>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

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
    <script src="{{ asset('vendor/adminlte/bower_components/chart.js/Chart.js') }}"></script>
    <script>
        $(function () {
           
                //-------------
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
                var pieChart       = new Chart(pieChartCanvas)
                var PieData        = [
                    {
                        value    : <?= $kejadian_by_jenis_kelamin?>,
                        color    : '#f56954',
                        highlight: '#f56954',
                        label    : 'Pria'
                    },
                    {
                        value    : <?= $kejadian_count - $kejadian_by_jenis_kelamin?>,
                        color    : '#00a65a',
                        highlight: '#00a65a',
                        label    : 'Wanita'
                    },
                ]
                pieChart.Doughnut(PieData)

                //-------------
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                pieChartCanvas = $('#pieChartkategori').get(0).getContext('2d')
                var pieChartkategori       = new Chart(pieChartCanvas)
                PieData        = [
                    {
                        value    : <?= $kejadian_by_kategori['NONEMERGENCY'] ?>,
                        color    : '#f56954',
                        highlight: '#f56954',
                        label    : 'NONEMERGENCY'
                    },
                    {
                        value    : <?= $kejadian_by_kategori['EMERGENCY'] ?>,
                        color    : '#00a65a',
                        highlight: '#00a65a',
                        label    : 'EMERGENCY'
                    },
                    {
                        value    : <?= $kejadian_by_kategori['INFORMASI'] ?>,
                        color    : '#f39c12',
                        highlight: '#f39c12',
                        label    : 'INFORMASI'
                    },
                    {
                        value    : <?= $kejadian_by_kategori['KRIMINAL'] ?>,
                        color    : '#00c0ef',
                        highlight: '#00c0ef',
                        label    : 'KRIMINAL'
                    },
                    {
                        value    : <?= $kejadian_by_kategori['BENCANA'] ?>,
                        color    : '#3c8dbc',
                        highlight: '#3c8dbc',
                        label    : 'BENCANA'
                    },
                    {
                        value    : <?= $kejadian_by_kategori['LAINNYA'] ?>,
                        color    : '#d2d6de',
                        highlight: '#d2d6de',
                        label    : 'LAINNYA'
                    }
                ]
                pieChartkategori.Doughnut(PieData)

                //-------------
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                pieChartCanvas = $('#pieChartUmur').get(0).getContext('2d')
                var pieChartUmur       = new Chart(pieChartCanvas)
                PieData        = [
                    {
                        value    : <?= ( isset( $kejadian_by_umur['0-9'] ) ) ? $kejadian_by_umur['0-9'] : 0 ?>,
                        color    : '#f56954',
                        highlight: '#f56954',
                        label    : '0-9'
                    },
                    {
                        value    : <?= ( isset( $kejadian_by_umur['10-19'] ) ) ? $kejadian_by_umur['10-19'] : 0 ?>,
                        color    : '#00a65a',
                        highlight: '#00a65a',
                        label    : '10-19'
                    },
                    {
                        value    : <?= ( isset( $kejadian_by_umur['20-29'] ) ) ? $kejadian_by_umur['20-29'] : 0 ?>,
                        color    : '#f39c12',
                        highlight: '#f39c12',
                        label    : '20-29'
                    },
                    {
                        value    : <?= ( isset( $kejadian_by_umur['30-39'] ) ) ? $kejadian_by_umur['30-39'] : 0 ?>,
                        color    : '#00c0ef',
                        highlight: '#00c0ef',
                        label    : '30-39'
                    },
                    {
                        value    : <?= ( isset( $kejadian_by_umur['40-49'] ) ) ? $kejadian_by_umur['40-49'] : 0 ?>,
                        color    : '#3c8dbc',
                        highlight: '#3c8dbc',
                        label    : '40-49'
                    },
                    {
                        value    : <?= ( isset( $kejadian_by_umur['>= 50'] ) ) ? $kejadian_by_umur['>= 50'] : 0 ?>,
                        color    : '#d2d6de',
                        highlight: '#d2d6de',
                        label    : '>= 50'
                    }
                ]
                pieChartUmur.Doughnut(PieData)

                 //-------------
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                pieChartCanvas = $('#pieChartTriage').get(0).getContext('2d')
                var pieChartTriage       = new Chart(pieChartCanvas)
                PieData        = [
                    {
                        value    : <?= ( isset( $kejadian_by_triage['M'] ) ) ? $kejadian_by_triage['M'] : 0 ?>,
                        color    : '#f56954',
                        highlight: '#f56954',
                        label    : 'M'
                    },
                    {
                        value    : <?= ( isset( $kejadian_by_triage['K'] ) ) ? $kejadian_by_triage['K'] : 0 ?>,
                        color    : '#00a65a',
                        highlight: '#00a65a',
                        label    : 'K'
                    },
                    {
                        value    : <?= ( isset( $kejadian_by_triage['H'] ) ) ? $kejadian_by_triage['H'] : 0 ?>,
                        color    : '#f39c12',
                        highlight: '#f39c12',
                        label    : 'H'
                    },
                    {
                        value    : <?= ( isset( $kejadian_by_triage['HT'] ) ) ? $kejadian_by_triage['HT'] : 0  ?>,
                        color    : '#00c0ef',
                        highlight: '#00c0ef',
                        label    : 'T'
                    }
                ]
                pieChartTriage.Doughnut(PieData)

        });
    </script>
    @yield('js')
@stop
