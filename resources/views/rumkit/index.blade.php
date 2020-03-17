@extends('adminlte::page')

@section('title', 'Data Rumah Sakit')

@section("content")

<div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border"><!--<h3 class="box-title">Data User</h3>-->
                    <a href="{{route('rumkit.create')}}" class="btn btn-success btn-sm">Tambah Rumah Sakit</a><br>
                    <div class="box-tools">
                            <form action="{{route('rumkit.index')}}">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                            <input type="text" value="{{Request::get('keyword')}}" name="keyword" class="form-control pull-right" placeholder="Filter Rumah Sakit">

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
                                        <th><b>Kode RS</b></th>
                                        <th><b>Nama RS</b></th>
                                        <th><b>Alamat</b></th>
                                        <th><b>No. Telp</b></th>
                                        <th><b>T. Kelas VIP</b></th>
                                        <th><b>T. Kelas 1</b></th>
                                        <th><b>T. Kelas 2</b></th>
                                        <th><b>T. Kelas 3</b></th>
                                        <th><b>IGD</b></th>
                                        <th><b>VK</b></th>
                                        <th><b>ICU</b></th>
                                        <th><b>ICCU</b></th>
                                        <th><b>PICU</b></th>
                                        <th><b>NICU</b></th>
                                        <th><b>Aksi</b></th>
                                        </tr>
                                        </thead>
                                        @foreach($rumkit as $rs)
                                        <tr>
                                        <td>{{$rs->kode_rs}}</td>
                                        <td>{{$rs->nama_rs}}</td>
                                        <td>{{$rs->alamat}}</td>
                                        <td>{{$rs->telpon}}</td>
                                        <td>{{$rs->tt_kelas_vip}}</td>
                                        <td>{{$rs->tt_kelas_1}}</td>
                                        <td>{{$rs->tt_kelas_2}}</td>
                                        <td>{{$rs->tt_kelas_3}}</td>
                                        <td>{{$rs->igd}}</td>
                                        <td>{{$rs->vk}}</td>
                                        <td>{{$rs->icu}}</td>
                                        <td>{{$rs->iccu}}</td>
                                        <td>{{$rs->picu}}</td>
                                        <td>{{$rs->nicu}}</td>
                                        <td>
                                        <div class="btn-group" style="width: 180px;">
                                        <a class="btn btn-info btn-sm" href="{{route('rumkit.show',['id'=>$rs->id])}}">Detail</a>
                                        <a class="btn btn-primary btn-sm" href="{{route('rumkit.edit',['id'=>$rs->id])}}">Ubah</a>
                                        <form onsubmit="return confirm('Anda yakin hapus rumkit ini?')" action="{{route('rumkit.destroy', ['id' => $rs->id ])}}" method="POST">
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
                                                    {{$rumkit->appends(Request::all())->links()}}
                                                </td>
                                                </tr>
                                                </tfoot>
                        </table>
                </div>
            </div>
        </div>
</div>

@endsection
