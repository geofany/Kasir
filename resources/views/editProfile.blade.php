@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>

                <div class="card-body">
                  <form class="" action="{{route('profile.store')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    Nama :
                    <input type="text" name="name" value="{{$userData->name}}" required>

                    <br>
                    Email :
                    <input type="text" name="email" value="{{$userData->email}}" required>

                    <br>
                    No. HP :
                    <input type="number" name="hp" value="{{$userData->hp}}" required>

                    <br>
                    Nama Toko :
                    <input type="text" name="namaToko" value="{{$userData->tokos->name}}" required>

                    <br>
                    Alamat Toko :
                    <input type="text" name="alamat" value="{{$userData->tokos->alamat}}" required>
                  <br>
                  <input type="submit" name="" value="SIMPAN">
                  </form>
                  <a href="{{route('profile.index')}}"><input type="submit" name="" value="KEMBALI"></a>






                </div>
            </div>
        </div>
    </div>
</div>
@endsection
