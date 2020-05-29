@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hallo, {{$userData->name}}</div>

                <div class="card-body">
                  <div class="">
                      <img src="{{$userData->tokos->logo_toko}}" width="120px" height="120px" class="img-circle"/>
                      <a href="{{route('profile.create')}}"><button class="btn btn-primary" type="button" name="button">Change Photo</button></a>
                  </div>

                  <div class="">
                    <span class="badge badge-primary">Nama</span>
                    <h2>{{$userData->name}}</h2>
                  </div>
                  <div class="">
                    <span class="badge badge-primary">E-mail</span>
                    <h4>{{$userData->email}}</h4>
                  </div>
                  <div class="">
                    <span class="badge badge-primary">No. HP</span>
                    <h4>{{$userData->hp}}</h4>
                  </div>
                  <div class="">
                    <span class="badge badge-primary">Nama Toko</span>
                    <h3>{{$userData->tokos->name}}</h3>
                  </div>
                  <div class="">
                    <span class="badge badge-primary">Alamat Toko</span>
                    <h4>
                    <?php
                    if ($userData->tokos->alamat == null) { ?>
                      Alamat Belum Di Isikan
                      <?php
                    } else { ?>
                      {{$userData->tokos->alamat}}
                      <?php
                    }?>
                    </h4>
                  </div>
                  <div class="form-group">
                    <?php
                    if (Auth::user()->roles === 1) { ?>
                      <span class="badge badge-primary">Status Akun</span>
                      <?php
                    } else { ?>
                      <span class="badge badge-warning">Status Akun</span>
                      <?php
                    }
                     ?>

                    <h4>
                      <?php
                      if (Auth::user()->roles === 1) { ?>
                        Basic
                        <?php
                      } else { ?>
                        Premium
                        <?php
                      }
                       ?>
                    </h4>
                  </div>
                  <?php
                  if (Auth::user()->roles === 1) { ?>
                    <div class="form-group">
                      <a href="{{ route('premium.index')}}"><button class="btn btn-success form-control" type="button" name="button">Upgrade ke Premium</button></a>
                    </div>
                    <?php
                  }  ?>

                  <div class="form-group">
                    <a href="{{ url('/editProfile')}}"><button class="btn btn-info form-control" type="button" name="button">Edit Profile</button></a>
                  </div>
                  <div class="form-group">
                    <a href="{{url('/changePassword')}}"><button class="btn btn-warning form-control" type="button" name="button">Ganti Password</button> </a>
                  </div>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
