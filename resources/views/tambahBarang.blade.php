@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @isset($message)
          @if($message == "Barang Berhasil Ditambahkan")
          <div class="alert alert-info">
          @else
          <div class="alert alert-danger">
          @endif
            <strong>{{$message}}</strong>
          </div>
          @endif
            <div class="card">

                <div class="card-header">Tambah Barang</div>

                <div class="card-body">
                  <form action="{{route('barang.store')}}" name="tambah" onsubmit="return validateForm()" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                      <label for="name">Nama Barang </label>
                      <input class="form-control" type="text" name="name" value="" required>
                    </div>
                    <div class="form-group">
                      <label for="harga_beli">Harga Beli</label>
                      <input class="form-control" type="number" name="harga_beli" value="" required>
                    </div>
                    <div class="form-group">
                      <label for="harga_jual">Harga Jual</label>
                      <input class="form-control" type="number" name="harga_jual" value="" required>
                    </div>
                    <div class="form-group">
                      <label for="stock">Stock</label>
                      <input class="form-control" type="number" name="stock" value="" required>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-info form-control" type="submit" name="button">Tambahkan Barang</button>

                    </div>
                  </form>
                  <a href="{{route('barang.index')}}"> <button class="btn btn-danger form-control" type="button" name="button">Kembali</button> </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  function validateForm() {
    var x = document.forms["tambah"]["harga_beli"].value;
    var y = document.forms["tambah"]["harga_jual"].value;
    if (Number(y) < Number(x)) {
      alert("Harga Jual Kurang Dari Harga Beli!");
      return false;
    }
  }
</script>
@endsection
