@extends('layouts.app')

@section('content')
<script src="https://kit.fontawesome.com/8eb2bbf105.js" crossorigin="anonymous"></script>
<div class="container">
    <div class="row justify-content-center">

      <div class="col-md-2">

      </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-header">
                        Kasir Basic
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <i class="fas fa-check"></i> <label for="">FREE</label>
                        </div>
                        <div class="form-group">
                          <i class="fas fa-times"></i> <label for="">Limited 20 Item</label>
                        </div>
                        <div class="form-group">
                          <i class="fas fa-times"></i> <label for="">Basic Statistic</label>
                        </div>
                        <div class="form-group">
                        <a href="{{route('profile.index')}}"><button type="button" class="btn btn-danger form-control" name="button">Back</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-header">
                        Kasir Premium
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <i class="fas fa-check"></i> <label for="">Rp. 15.000/Lifetime</label>
                        </div>
                        <div class="form-group">
                          <i class="fas fa-check"></i> <label for="">Unlimited Item</label>
                        </div>
                        <div class="form-group">
                          <i class="fas fa-check"></i> <label for="">Advanced Statistic</label>
                        </div>
                        <div class="form-group">
                          <a href="{{route('premium.create')}}"><button type="button" class="btn btn-warning form-control" name="button">Upgrade Premium</button></a>
                        </div>
                      </div>
                    </div>
                  </div>



    </div>
</div>
@endsection
