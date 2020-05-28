@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hallo, Nama</div>

                <div class="card-body">
                  <form class="" action="{{route('profile.store')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    Nama :
                    <input type="text" name="name" value="{{$userData->name}}">

                    <br>
                    Email :
                    <input type="text" name="email" value="{{$userData->email}}">

                    <br>
                    No. HP :
                    <input type="number" name="hp" value="{{$userData->hp}}">
                
                  <br>
                  <input type="submit" name="" value="SIMPAN">
                  </form>





                </div>
            </div>
        </div>
    </div>
</div>
@endsection
