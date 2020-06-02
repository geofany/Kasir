@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-2">

      </div>
        <div class="col-md-10">
            <div class="card">
              @if(Auth::user()->roles === 0)
                <div class="card-header">User Baru Hari Ini</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                        <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>Nama</th>
                            <th>Nomer HP</th>
                            <th>E-mail</th>
                            <th>Nama Toko</th>
                            <th>Alamat</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                          @foreach($user as $users)
                          <tr>
                            <td>{{$i}}</td>
                            <td>{{$users->name}}</td>
                            <td>{{$users->hp}}</td>
                            <td>{{$users->email}}</td>
                            <td>{{$users->tokos->name}}</td>
                            <td>{{$users->tokos->alamat}}</td>
                          </tr>
                          <?php $i++; ?>
                          @endforeach
                        </tbody>


                    <tbody>
                    </table>
                </div>
              @else
                <div class="card-header">Penjualan Hari Ini</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                        <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>Kode Penjualan</th>
                            <th>Total Belanja</th>
                            <th>Jumlah Uang</th>
                            <th>Kembalian</th>
                            <th>Keuntungan</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                          @foreach($nota as $notas)
                          <tr>
                            <td>{{$i}}</td>
                            <td>{{$notas->id}}</td>
                            <td>{{$notas->total_bayar - $notas->total_kembalian}}</td>
                            <td>{{$notas->total_bayar}}</td>
                            <td>{{$notas->total_kembalian}}</td>
                            <td>{{$notas->total_keuntungan}}</td>
                          </tr>
                          <?php $i++; ?>
                          @endforeach
                        </tbody>


                    <tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
