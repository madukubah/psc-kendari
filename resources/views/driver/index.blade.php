@extends('adminlte::page')

@section('title', 'Data Petugas')

@section("content")

<div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border"><!--<h3 class="box-title">Data User</h3>-->
                    <a href="{{route('driver.create')}}" class="btn btn-success btn-sm">Tambah Driver</a><br>
                    <div class="box-tools">
                            <form action="{{route('driver.index')}}">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                            <input type="text" value="{{Request::get('keyword')}}" name="keyword" class="form-control pull-right" placeholder="Filter Driver">

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
                                        <th><b>Nama Petugas</b></th>
                                        <th><b>Alamat</b></th>
                                        <th><b>No. Telp</b></th>
                                        <th><b>Username</b></th>
                                        <th><b>Email</b></th>
                                        <th><b>Tempat Bertugas</b></th>
                                        <th><b>Aksi</b></th>
                                        </tr>
                                        </thead>
                                        @foreach($driver as $drivers)
                                        <tr>
                                        <td>{{$drivers->nama_driver}}</td>
                                        <td>{{$drivers->alamat}}</td>
                                        <td>{{$drivers->telpon}}</td>
                                        <td>{{$drivers->username}}</td>
                                        <td>{{$drivers->email}}</td>
                                        <td>
                                            {{$drivers->puskesmas->nama_puskesmas}}
                                        </td>
                                        <td>
                                        <div class="btn-group" style="width: 180px;">
                                        <a class="btn btn-info btn-sm disabled" href="{{route('driver.show',['id'=>$drivers->id])}}" >Detail</a>
                                        <a class="btn btn-primary btn-sm" href="{{route('driver.edit',['id'=>$drivers->id])}}">Ubah</a>
                                        <form onsubmit="return confirm('Anda yakin hapus Driver ini?')" action="{{route('driver.destroy', ['id' => $drivers->id ])}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                                        </form>
                                        </div>
                                        </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                                <tr>
                                                <td colspan=10>
                                                    {{$driver->appends(Request::all())->links()}}
                                                </td>
                                                </tr>
                                                </tfoot>
                        </table>
                </div>
            </div>
        </div>
</div>

@endsection
