@extends('adminlte::page')

@section('title', 'Ubah User')

@section("content")

<div class="row">
        <div class="col-md-8">
<div class="box box-success">
    <div class="box-header with-border"><h3 class="box-title">Ubah User</h3></div>
        <div class="box-body">
                @if(session('status'))
                    <div class="callout callout-info">{{session('status')}}</div>
                @endif
                <form enctype="multipart/form-data" action="{{route('users.update', ['id'=>$user->id])}}" method="POST">
                    @csrf
                    <input type="hidden" value="PUT" name="_method">

                        <label for="name">Nama Lengkap</label>
                        <input value="{{$user->name}}" class="form-control" placeholder="Nama Lengkap" type="text" name="name" id="name"/><br>


                        <label for="username">Username</label>
                        <input value="{{$user->username}}" class="form-control" placeholder="username" type="text" name="username" id="username"/><br>

                        <label for="email">Email</label>
                        <input class="form-control" placeholder="user@mail.com" type="text" name="email" id="email" value="{{$user->email}}" disabled/><br>

                        <label for="status">Status</label>
                        <div class="radio icheck">
                            <input {{$user->status == "ACTIVE" ? "checked" : ""}} type="radio" name="status" id="active" value="ACTIVE"> <label for="active">Aktif</label> <br>
                            <input {{$user->status == "INACTIVE" ? "checked" : ""}} type="radio" name="status" id="inactive" value="INACTIVE"> <label for="inactive">Tidak Aktif</label> <br>
                        </div>

                        <label for="">Roles</label>
                        <div class="radio icheck">
                            <input type="radio" {{in_array("ADMIN", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="ADMIN" value="ADMIN"> <label for="ADMIN">Administrator</label> <br>
                            <input type="radio" {{in_array("STAFF", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="STAFF" value="STAFF"> <label for="STAFF">Staff</label> <br>
                            <input type="radio" {{in_array("OPERATOR", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="OPERATOR" value="OPERATOR"> <label for="OPERATOR">Operator</label> <br>
                            </div>

                        <label for="phone">No. Telp</label>
                        <input type="text" name="phone" class="form-control" value="{{$user->phone}}"><br>

                        <label for="address">Alamat</label>
                        <textarea name="address" id="address" class="form-control">{{$user->address}}</textarea><br>

                        <label for="avatar">Gambar Avatar</label>
                        <br>Avatar Saat ini : <br>
                        @if($user->avatar)
                            <img src="{{asset('storage/'.$user->avatar)}}" width="120px" /><br>
                        @else
                            No avatar
                        @endif
                        <input id="avatar" name="avatar" type="file" class="form-control">
                        <p class="help-block">Kosongkan jika tidak ingin mengubah avatar</p>

                        <!-- <label for="password">Kata Sandi</label>
                        <input class="form-control" placeholder="password" type="password" name="password" id="password"/><br>

                        <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                        <input class="form-control" placeholder="password confirmation" type="password" name="password_confirmation" id="password_confirmation"/><br>-->
                        <div class="row">
                        <div class="col-xs-1">
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button><br></div></div>
                </form>
            </div>
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
    @yield('js')
@stop
