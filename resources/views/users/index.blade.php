@extends('adminlte::page')

@section('title', 'Grup User')

@section("content")

<div class="box box-success">
    <div class="box-header with-border"><!--<h3 class="box-title">Data User</h3>-->
        <a href="{{route('users.create')}}" class="btn btn-success btn-sm">Tambah User</a><br>
        <div class="box-tools">
                <form action="{{route('users.index')}}">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" value="{{Request::get('keyword')}}" name="keyword" class="form-control pull-right" placeholder="Filter Email">

                  <div class="input-group-btn">
                    <input type="submit" class="btn btn-default" value="Cari"><i class="fa fa-search">Cari</i>
                  </div>
                </div>
                </form>
        </div>
    </div>
    @if(session('status'))
        <div class="callout callout-info">{{session('status')}}</div>
    @endif

    <!--<div class="row">
        <div class="col-xs-6">
            <a href="{{route('users.create')}}" class="btn btn-success btn-sm">Tambah User</a><br>
        </div>
    </div>-->

    <div class="row">
            <div class="col-xs-12">
                <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                    <thead>
                    <tr>
                    <th><b>Nama Lengkap</b></th>
                    <th><b>Username</b></th>
                    <th><b>Email</b></th>
                    <th><b>No. Telp.</b></th>
                    <th><b>Status</b></th>
                    <th><b>Aksi</b></th>
                    </tr>
                    </thead>
                    @foreach($users as $user)
                    <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>
                        @if($user->status == "ACTIVE")
                            <span class="label bg-green">{{$user->status}}</span>
                        @else
                            <span class="label bg-red">{{$user->status}}</span>
                        @endif
                    </td>
                    <!--<td>@if($user->avatar)
                    <img src="{{asset('storage/'.$user->avatar)}}" width="70px"/>
                    @else
                    N/A
                    @endif</td>-->
                    <td>
                    <div class="btn-group" style="width: 180px;">
                    <a class="btn btn-info btn-sm" href="{{route('users.show',['id'=>$user->id])}}">Detail</a>
                    <a class="btn btn-primary btn-sm" href="{{route('users.edit',['id'=>$user->id])}}">Ubah</a>
                    <form onsubmit="return confirm('Anda yakin hapus user ini?')" action="{{route('users.destroy', ['id' => $user->id ])}}" method="POST">
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
                            {{$users->appends(Request::all())->links()}}
                        </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
</div>

@endsection
