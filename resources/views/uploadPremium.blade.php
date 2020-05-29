@extends('layouts.app')

@section('content')
<script src="https://kit.fontawesome.com/8eb2bbf105.js" crossorigin="anonymous"></script>
<div class="container">
    <div class="row justify-content-center">


                  <div class="col-md-7">
                    @isset($message)
                    <div class="alert alert-info">
                      <strong>{{$message}}</strong>
                    </div>
                    @endif
                    <div class="card">
                      <div class="card-header">
                        Upload Bukti Pembayaran
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="">Silahkan Transfer ke Rekening </label>
                        </div>
                        <div class="form-group">
                          <span class="badge badge-primary">BCA</span> <label for="">12345678 a/n Geofany Galindra</label>
                        </div>
                        <div class="form-group">
                          <span class="badge badge-warning">BNI</span> <label for="">12345678 a/n Geofany Galindra</label>
                        </div>
                        <div class="form-group">
                          <span class="badge badge-info">Mandiri</span> <label for="">12345678 a/n Geofany Galindra</label>
                        </div>
                        <div class="form-group">
                          <form class="" action="{{route('premium.store')}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                              <label for="">Upload Bukti Transfer</label>
                              <input type="file" class="form-control" name="bukti" value="">
                            </div>
                            <button class="btn btn-primary form-control" type="submit" name="button">Upload !</button>
                          </form>
                        </div>
                        <div class="form-group">
                        <a href="{{route('profile.index')}}"><button type="button" class="btn btn-danger form-control" name="button">Back</button></a>
                        </div>
                      </div>
                    </div>
                  </div>



    </div>
</div>
@endsection
