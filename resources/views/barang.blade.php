@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-2">

      </div>
        <div class="col-md-10">
          @isset($message)
          <div class="alert alert-danger">
            <strong>{{$message}}</strong>
          </div>
          @endif
            <div class="card-box">
                <div class="card-header">
                <a href="{{route('barang.create')}}">
                        <button type="button" class="btn btn-sm btn-primary waves-effect waves-light float-right">
                             Tambahkan Produk
                        </button>
                    </a>
                    <h4 class="header-title mb-4">Manajemen Produk</h4>

                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                        <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>Nama Produk</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Jumlah Stok</th>
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
