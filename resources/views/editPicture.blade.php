@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-2">

      </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Picture</div>

                <div class="card-body">
                  <div class="form-group">
                    <img src="{{$userData->tokos->logo_toko}}" width="120px" height="120px" class="img-circle"/>

                  </div>
                  <form class="" action="{{url('/storePicture')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                      <label for="name">File :</label>
                      <input class="form-control" type="file" name="pic" value="" required>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary form-control" type="submit" name="button">Simpan</button>
                    </div>

                  </form>
                  <div class="form-group">
                    <form class="" action="{{url('/storePicture')}}" method="post">
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <button type="submit" class="btn btn-danger form-control">Hapus</button>
                    </form>

                  </div>
                  <a href="{{route('profile.index')}}"> <button class="btn btn-warning form-control" type="button" name="button">Kembali</button> </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
