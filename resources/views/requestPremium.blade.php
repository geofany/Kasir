@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                      @foreach($user as $users)
                      <tr>
                        <td scope="col">{{$i}}</td>
                        <td>{{$users->name}}</td>
                        <td>File</td>
                        <td>
                            <button class="btn btn-warning" type="button" name="button">Premium</button>                        
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
