@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hallo, {{$userData->name}}</div>

                <div class="card-body">
                    Nama : {{$userData->name}}
                    <br>
                    Email : {{$userData->email}}
                    <br>
                    No. HP : {{$userData->hp}}
                    <br>
                    Nama Toko : {{$userData->tokos->name}}
                    <br>
                    Alamat Toko :
                    <?php
                  if ($userData->tokos->alamat == null) { ?>
                    Alamat Belum Di Isikan
                    <?php

                  } else { ?>
                    {{$userData->tokos->alamat}}
                    <?php

                  }?>
                  <br>
                  <a href="{{ url('/editProfile')}}"><input type="button" name="Edit" value="Edit Profile"></a>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
