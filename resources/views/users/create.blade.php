@extends('adminlte::page')

@section('title', 'Buat User')

@section("content")

<div class="box box-success">
<div class="box-header with-border"><h3 class="box-title">Buat User</h3></div>
<div class="box-body">
        @if(session('status'))
            <div class="callout callout-info">{{session('status')}}</div>
        @endif
<div class="row">

<form enctype="multipart/form-data" action="{{route('users.store')}}" method="POST">

@csrf
<div class="col-xs-6">
      <label for="name">Nama Lengkap</label>
      <input class="form-control" placeholder="Nama Lengkap" type="text" name="name" id="name"/><br>


      <label for="username">Username</label>
      <input class="form-control" placeholder="username" type="text" name="username" id="username"/><br>

      <label for="">Roles</label>
      <div class="radio icheck">
          <input type="radio" name="status" id="active" value="ACTIVE"> <label for="ACTIVE">AKTIF</label> <br>
          <input type="radio" name="status" id="inacive" value="INACTIVE"> <label for="INACTIVE">TIDAK AKTIF</label> <br>
        </div>

      <label for="">Roles</label>
      <div class="radio icheck">
          <input type="radio" name="roles[]" id="ADMIN" value="ADMIN"> <label for="ADMIN">Administrator</label> <br>
          <input type="radio" name="roles[]" id="STAFF" value="STAFF"> <label for="STAFF">Staff</label> <br>
          <input type="radio" name="roles[]" id="OPERATOR" value="OPERATOR"> <label for="OPERATOR">Operator</label> <br>
        </div>

      <label for="phone">No. Telp</label>
      <input type="text" name="phone" class="form-control"><br>

      <label for="address">Alamat</label>
      <textarea name="address" id="address" class="form-control"></textarea><br>

      <label for="avatar">Gambar Avatar</label>
      <input id="avatar" name="avatar" type="file" class="form-control"><br>
</div>
<div class="col-xs-6">
      <!-- <hr class="my-3"> -->

      <label for="email">Email</label>
      <input class="form-control" placeholder="user@mail.com" type="text" name="email" id="email"/>
      <br>

      <label for="password">Kata Sandi</label>
      <input class="form-control" placeholder="password" type="password" name="password" id="password"/>
      <br>

      <label for="password_confirmation">Konfirmasi Kata Sandi</label>
      <input class="form-control" placeholder="password confirmation" type="password" name="password_confirmation" id="password_confirmation"/>
      <br>
      </div>
      <div class="row">
      <div class="col-xs-1">
      <button type="submit" class="btn btn-success btn-sm">Simpan</button><br></div></div>
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
    @yield('js')
@stop
