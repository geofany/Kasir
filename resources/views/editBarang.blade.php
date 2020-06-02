@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-2">

      </div>
        <div class="col-md-8">
          @isset($message)
          <div class="alert alert-warning">
            <strong>{{$message}}</strong>
          </div>
          @endif
          <h4 class="page-title">Edit Data Barang</h4>
            <div class="card">

                <div class="card-body">
                  <form action="{{route('barang.update', $barang->id)}}" name="edit" onsubmit="return validateForm()" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                      <label for="name">Nama Barang </label>
                      <input class="form-control" type="text" name="name" value="{{$barang->name}}" required>
                    </div>
                    <div class="form-group">
                      <label for="harga_beli">Harga Beli</label>
                      <input class="form-control" type="number" name="harga_beli" value="{{$barang->harga_beli}}" required>
                    </div>
                    <div class="form-group">
                      <label for="harga_jual">Harga Jual</label>
                      <input class="form-control" type="number" name="harga_jual" value="{{$barang->harga_jual}}" required>
                    </div>
                    <div class="form-group">
                      <label for="stock">Stock</label>
                      <input class="form-control" type="number" name="stock" value="{{$barang->stock}}" required>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-warning" type="submit" name="button">Edit Barang</button>
                      <a href="{{route('barang.index')}}"> <button class="btn btn-danger" type="button" name="button">Kembali</button> </a>

                    </div>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  function validateForm() {
    var x = document.forms["edit"]["harga_beli"].value;
    var y = document.forms["edit"]["harga_jual"].value;
    if (Number(y) < Number(x)) {
      alert("Harga Jual Kurang Dari Harga Beli!");
      return false;
    }
  }
</script>
@endsection
