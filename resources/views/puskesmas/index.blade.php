@extends('adminlte::page')

@section('title', 'Data Puskesmas')

@section("content")

<div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border"><!--<h3 class="box-title">Data User</h3>-->
                    <a href="{{route('puskesmas.create')}}" class="btn btn-success btn-sm">Tambah Puskesmas</a><br>
                    <div class="box-tools">
                            <form action="{{route('puskesmas.index')}}">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                            <input type="text" value="{{Request::get('keyword')}}" name="keyword" class="form-control pull-right" placeholder="Filter Puskesmas">

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
                                        <th><b>Nama Puskesmas</b></th>
                                        <th><b>Alamat</b></th>
                                        <th><b>No. Telp</b></th>
                                        <th><b>Username</b></th>
                                        <th><b>Aksi</b></th>
                                        </tr>
                                        </thead>
                                        @foreach($puskesmas as $puskesmas1)
                                        <tr>
                                        <td>{{$puskesmas1->nama_puskesmas}}</td>
                                        <td>{{$puskesmas1->alamat}}</td>
                                        <td>{{$puskesmas1->telpon}}</td>
                                        <td>{{$puskesmas1->username}}</td>
                                        <td>
                                        <div class="btn-group" style="width: 180px;">
                                        <a class="btn btn-info btn-sm" href="{{route('puskesmas.show',['id'=>$puskesmas1->id])}}">Detail</a>
                                        <a class="btn btn-primary btn-sm" href="{{route('puskesmas.edit',['id'=>$puskesmas1->id])}}">Ubah</a>
                                        <form onsubmit="return confirm('Anda yakin hapus Puskesmas ini?')" action="{{route('puskesmas.destroy', ['id' => $puskesmas1->id ])}}" method="POST">
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
                                                    {{$puskesmas->appends(Request::all())->links()}}
                                                </td>
                                                </tr>
                                                </tfoot>
                        </table>
                </div>
            </div>
        </div>
</div>

@endsection
