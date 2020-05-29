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

                    <div class="form-group">
                      <label for="name">Nama :</label>
                      <input class="form-control" type="text" name="name" value="{{$userData->name}}" required>
                    </div>
                    <div class="form-group">
                      <label for="email">E-mail :</label>
                      <input class="form-control" type="email" name="name" value="{{$userData->email}}" required>
                    </div>
                    <div class="form-group">
                      <label for="hp">No. HP :</label>
                      <input class="form-control" type="number" name="name" value="{{$userData->hp}}" required>
                    </div>
                    <div class="form-group">
                      <label for="namaToko">Nama Toko :</label>
                      <input class="form-control" type="text" name="name" value="{{$userData->tokos->name}}" required>
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat :</label>
                      <input class="form-control" type="text" name="name" value="{{$userData->tokos->alamat}}" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success form-control" type="submit" name="button">Simpan</button>
                    </div>

                  </form>
                  <a href="{{route('profile.index')}}"> <button class="btn btn-danger form-control" type="button" name="button">Kembali</button> </a>






                </div>
            </div>
        </div>
    </div>
</div>
@endsection
