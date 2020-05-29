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
                      <th scope="col">Status</th>
                      <th scope="col">No. HP</th>
                      <th scope="col">E-mail</th>
                      <th scope="col">Nama Toko</th>
                      <th scope="col">Alamat Toko</th>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      @foreach($user as $users)
                      <tr>
                        <td scope="col">{{$i}}</td>
                        <td>{{$users->name}}</td>
                        <td>
                          @if($users->roles === 1)
                            <span class="badge badge-secondary">Basic</span>
                          @else
                            <span class="badge badge-warning">Premium</span>
                          @endif
                        </td>
                        <td>{{$users->hp}}</td>
                        <td>{{$users->email}}</td>
                        <td>{{$users->tokos->name}}</td>
                        <td>{{$users->tokos->alamat}}</td>                      
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
