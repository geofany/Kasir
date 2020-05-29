@extends('layouts.app')

@section('content')
<link href="path/to/select2.min.css" rel="stylesheet" />
<script src="path/to/select2.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kasir</div>

                <div class="card-body">
                    Barang :
                    <select class="form-control js-example-basic-single" name="barang" id="barang">
                      <option value="">Barang</option>
                      @foreach($barang as $barangs)
                      <option value="{{$barangs['id']}}">{{$barangs['name']}}</option>
                      @endforeach
                    </select>
                    Harga :
                    <div class="" name="harga">

                    </div>
                    <input class="form-control" type="number" name="harga_jual" value="" disabled required>
                    Quantity :
                    <input class="form-control" type="number" name="quantity" value="" required>
                    Total :
                    <input class="form-control" type="number" name="total" value="" disabled required>
                    <br>
                    <button type="button" class="btn btn-info form-control" name="button">Add To Cart</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$( 'select[name="barang"]')
  .change(function () {
    var str = "";
    $( "select option:selected" ).each(function() {
      str += $( this ).text() + " ";
    });
    $( 'div[name="harga"]' ).text( str );
  })
  .change();
</script>
@endsection
