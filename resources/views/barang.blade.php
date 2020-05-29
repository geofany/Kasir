@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @isset($message)
          <div class="alert alert-danger">
            <strong>{{$message}}</strong>
          </div>
          @endif
            <div class="card">
                <div class="card-header">Daftar Barang <a href="{{route('barang.create')}}"><button style="right:0" type="button" class="btn btn-info" name="button">Tambah</button></a>  </div>

                <div class="card-body">
                  <table class="table table-dark">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stock</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>


                    <?php $i = 1; ?>
                    @foreach ($barang as $barangs)
                    <tr>
                      <th>{{$i}}</th>
                      <td>{{$barangs->name}}</td>
                      <td>{{$barangs->harga_beli}}</td>
                      <td>{{$barangs->harga_jual}}</td>
                      <td>{{$barangs->stock}}</td>
                      <td> <a href="{{route('barang.edit', $barangs->id)}}"><button class="btn btn-warning" type="button" name="button">Edit</button></a></td>
                      <td><form method="POST" action="{{ route('barang.destroy', $barangs->id) }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit" name="button">Delete</button>
                      </form></td>
                      <?php $i++;  ?>
                    </tr>


                    @endforeach
                    </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
