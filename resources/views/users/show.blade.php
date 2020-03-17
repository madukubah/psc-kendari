@extends('adminlte::page')

@section('title', 'Detail User')

@section("content")

<div class="row">
    <div class="col-md-8">
<div class="box box-success">
    <div class="box-header with-border"><h3 class="box-title">Detail User</h3></div>
            <div class="box-body">
                        <div class="card">
                            <div class="card-body">
                                <b>Nama Lengkap :</b><br/>{{$user->name}}<br><br>
                                @if($user->avatar)
                                    <img src="{{asset('storage/'. $user->avatar)}}" width="128px"/>
                                @else
                                    No avatar
                                @endif <br><br>
                            <b>Email :</b><br>{{$user->email}}<br><br>
                            <b>No. Telp :</b> <br>{{$user->phone}}<br><br>
                            <b>Alamat :</b> <br>{{$user->address}}<br><br>
                            <b>Roles :</b> <br>
                            @foreach (json_decode($user->roles) as $role) &middot; {{$role}} <br>
                            @endforeach
                            </div>
                        </div>
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
