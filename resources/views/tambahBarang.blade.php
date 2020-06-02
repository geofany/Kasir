@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-2">

      </div>
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
            <h4 class="page-title">Tambah Data Barang</h4>

            <div class="card">

                    <div class="card-body">

                        <form class="needs-validation" action="{{route('barang.store')}}" name="tambah" onsubmit="return validateForm()" method="post">
                            @csrf

                            <div class="form-group position-relative mb-3">
                                <label for="name">Nama Produk</label>
                                <input name="name" type="text" class="form-control" placeholder="Nama Produk" value="" required>

                            </div>
                            <div class="form-group position-relative mb-3">
                                <label for="harga_beli">Harga Beli</label>
                                <input name="harga_beli" type="number" class="form-control" placeholder="Harga Beli" value="" required>

                            </div>
                            <div class="form-group position-relative mb-3">
                                <label for="harga_jual">Harga Jual</label>
                                <input name="harga_jual" type="number" class="form-control" placeholder="Harga Jual" value="" required>
                            </div>

                            <div class="form-group position-relative mb-3">
                                <label for="stock">Jumlah Stock</label>
                                <input name="stock" type="number" class="form-control"  placeholder="Jumlah Stok Produk" value="" required>
                            </div>


                            <button class="btn btn-primary" type="submit">Tambahkan Barang</button>
                            <a href="{{route('barang.index')}}"> <button class="btn btn-danger" type="button" name="button">Kembali</button> </a>
                            </form>


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
