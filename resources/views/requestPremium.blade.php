@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-1">

      </div>
        <div class="col-md-11">
          @isset($message)
          <div class="alert alert-warning">
            <strong>{{$message}}</strong>
          </div>
          @endif
            <div class="card">
                <div class="card-header">List User</div>

                <div class="card-body">
                  <table class="table table-hover">
                    <thead>
                      <th scope="col">No.</th>
                      <th scope="col">Nama User</th>
                      <th scope="col">Bukti</th>
                      <th scope="col">Aprrove</th>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      @foreach($premiums as $premium)
                      <tr>
                        <td scope="col">{{$i}}</td>
                        <td>{{$premium->users->name}}</td>
                        <td><a target="_blank" href="{{$premium->bukti_bayar}}">File</a> </td>
                        <td>
                        <a href="{{url('/approve')}}/{{$premium->id}}"><button class="btn btn-warning" type="button" name="button">Premium</button></a>
                        </td>
                      </tr>
                      <?php $i++;  ?>
                      @endforeach
                    </tbody>
                  </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
