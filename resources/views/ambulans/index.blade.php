@extends('adminlte::page')

@section('title', 'Data Ambulans')

@section("content")
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <!--<h3 class="box-title">Data User</h3>-->
                <a href="{{route('ambulans.create')}}" class="btn btn-success btn-sm">Tambah Ambulans</a>
                <br>
                <div class="box-tools">
                    <form action="{{route('driver.index')}}">
                        <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                            <input type="text" value="{{Request::get('keyword')}}" name="keyword" class="form-control pull-right" placeholder="Filter Ambulans">

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
                                <th><b>No. Plat</b></th>
                                <th><b>No. Telp</b></th>
                                <th><b>Kelengkapan</b></th>
                                <th><b>Tempat Bertugas</b></th>
                                <th><b>Aksi</b></th>
                            </tr>
                        </thead>
                        @foreach($ambulans as $ambulan)
                        <tr>
                            <td>{{$ambulan->no_plat}}</td>
                            <td>{{$ambulan->telpon}}</td>
                            <td>{{$ambulan->kelengkapan}}</td>
                            <td>
                                {{$ambulan->puskesmas->nama_puskesmas}}
                            </td>
                            <td>
                                <div class="btn-group" style="width: 180px;">
                                    <a class="btn btn-info btn-sm " href="{{route('ambulans.show',['id'=>$ambulan->id])}}">Detail</a>
                                    <a class="btn btn-primary btn-sm " href="{{route('ambulans.edit',['id'=>$ambulan->id])}}">Ubah</a>
                                    <form onsubmit="return confirm('Anda yakin hapus Ambulans ini?')" action="{{route('ambulans.destroy', ['id' => $ambulan->id ])}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" value="Hapus" class="btn btn-danger btn-sm disabled">
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan=10>
                                {{$ambulans->appends(Request::all())->links()}}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
