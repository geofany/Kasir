@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
      <div class="card-header bg-white">
        Hallo, {{$userData->name}}
      </div>
      <div class="card-body text-center bg-white">
        <div class="">
          <img src="{{$userData->tokos->logo_toko}}" width="200px" height="200px" class="img-circle"/>
          <a href="{{route('profile.create')}}"><button class="btn btn-primary" type="button" name="button">Change Photo</button></a>
        </div>

      </div>
      <div class="card-header bg-white">
        <span class="card-title text-left">NAMA</span>
        <h5 class="card-text text-left">{{$userData->name}}</h5>
      </div>

      <div class="card-header bg-white">
        <span class="card-title text-left">E-MAIL</span>
        <h5 class="card-text text-left">{{$userData->email}}</h5>
      </div>

      <div class="card-header bg-white">
        <span class="card-title text-left">NO HP</span>
        <h5 class="card-text text-left">{{$userData->hp}}</h5>
      </div>

      <div class="card-header bg-white">
        <span class="card-title text-left">NAMA TOKO</span>
        <h5 class="card-text text-left">{{$userData->tokos->name}}</h5>
      </div>

      <div class="card-header bg-white">
        <span class="card-title text-left">ALAMAT TOKO</span>
        <h5 class="card-text text-left">
          <?php
          if ($userData->tokos->alamat == null) { ?>
            Alamat Belum Di Isikan
            <?php
          } else { ?>
            {{$userData->tokos->alamat}}
            <?php
          }?>
        </h5>
      </div>

      <div class="card-header bg-white">
        <?php
        if (Auth::user()->roles === 1) { ?>
          <span class="card-title text-left">STATUS AKUN</span>
          <?php
        } else { ?>
          <span class="card-title text-left">STATUS AKUN</span>
          <?php
        }
        ?>

        <h5 class="card-text text-left">
          <?php
          if (Auth::user()->roles === 1) { ?>
            Basic
            <?php
          } else { ?>
            Premium
            <?php
          }
          ?>
        </h5>
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
@endsection
