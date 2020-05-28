@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @isset($message)
          <div class="alert alert-success">
            <strong>{{$message}}</strong>
          </div>
          @endif
            <div class="card">

                <div class="card-header">Tambah Barang</div>

                <div class="card-body">
                  <form action="{{route('barang.store')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                      <label for="name">Nama Barang </label>
                      <input class="form-control" type="text" name="name" value="">
                    </div>
                    <div class="form-group">
                      <label for="harga_beli">Harga Beli</label>
                      <input class="form-control" type="number" name="harga_beli" value="">
                    </div>
                    <div class="form-group">
                      <label for="harga_jual">Harga Jual</label>
                      <input class="form-control" type="number" name="harga_jual" value="">
                    </div>
                    <div class="form-group">
                      <label for="stock">Stock</label>
                      <input class="form-control" type="number" name="stock" value="">
                    </div>
                    <button class="btn btn-info form-control" type="submit" name="button">Tambahkan Barang</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
