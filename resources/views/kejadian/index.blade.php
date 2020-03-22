@extends('adminlte::page')

@section('title', 'Laporan Kejadian')

@section("content")

<div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border"><!--<h3 class="box-title">Data User</h3>-->
                    <a href="{{route('kejadian.create')}}" class="btn btn-success btn-sm">Tambah Data</a><br>
                    <div class="box-tools">
                            <form action="{{route('kejadian.index')}}">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                            <input type="text" value="{{Request::get('keyword')}}" name="keyword" class="form-control pull-right" placeholder="Filter Kejadian">

                            <div class="input-group-btn">
                                <input type="submit" class="btn btn-default" value="Cari"><i class="fa fa-search"></i>
                            </div>
                            </div>
                            </form>
                    </div>
                </div>
                @if(session('status'))
                    <div class="callout callout-info">{{session('status')}}</div>
                @endif
                <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                                <tbody>
                                        <thead>
                                        <tr>
                                        <th><b>Tanggal</b></th>
                                        <th><b>No. Register</b></th>
                                        <th><b>Identitas Pelapor</b></th>
                                        <th><b>Identitas Korban</b></th>
                                        <th><b>Lokasi</b></th>
                                        <th><b>Triage</b></th>
                                        <th><b>Aksi</b></th>
                                        </tr>
                                        </thead>
                                        @foreach($kejadian as $kejadians)
                                        <tr>
                                        <td>{{$kejadians->created_at}}</td>
                                        <td>{{$kejadians->no_kejadian}}</td>
                                        <td>{{$kejadians->pelapor}}</td>
                                        <td>{{$kejadians->nama_korban}}</td>
                                        <td>{{$kejadians->lokasi}}</td>
                                        <td>{{$kejadians->triage}}</td>
                                        <td>
                                        <div class="btn-group" style="width: 180px;">
                                        <a class="btn btn-info btn-sm " href="{{route('kejadian.show',['id'=>$kejadians->id])}}" >Detail</a>
                                        <a class="btn btn-primary btn-sm " href="{{route('kejadian.edit',['id'=>$kejadians->id])}}">Ubah</a>
                                        <form onsubmit="return confirm('Anda yakin hapus Kejadian ini?')" action="{{route('kejadian.destroy', ['id' => $kejadians->id ])}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" value="Hapus" class="btn btn-danger btn-sm ">
                                        </form>
                                        </div>
                                        </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                                <tr>
                                                <td colspan=10>
                                                    {{$kejadian->appends(Request::all())->links()}}
                                                </td>
                                                </tr>
                                                </tfoot>
                        </table>
                </div>
            </div>
        </div>
</div>

@endsection
