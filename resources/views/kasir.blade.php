@extends('layouts.app')

@section('content')
<script type="text/javascript">
  function totalAmount(){
		var t = 0;
		$('.amount').each(function(i,e){
			var amt = $(this).val()-0;
			t += amt;
		});
		$('.total').html(t);
	}
	$(function () {
		$('.getmoney').change(function(){
			var total = $('.total').html();
			var getmoney = $(this).val();
			var t = getmoney - total;
			$('.backmoney').val(t).toFixed(2);
		});
		$('.add').click(function () {
			var product = $('.product_id').html();
			var n = ($('.neworderbody tr').length - 0) + 1;
			var tr = '<tr><td class="no">' + n + '</td>' + '<td><select class="form-control product_id" name="product_id[]">' + product + '</select></td>' +
				'<td><input type="text" class="qty form-control" name="qty[]" value="{{ old('
			email ') }}"></td>' +
				'<td><input type="text" class="price form-control" name="price[]" value="{{ old('
			email ') }}"></td>' +
				'<td><input type="text" class="amount form-control" name="amount[]"></td>' +
				'<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
			$('.neworderbody').append(tr);
		});
		$('.neworderbody').delegate('.delete', 'click', function () {
			$(this).parent().parent().remove();
			totalAmount();
		});
		$('.neworderbody').delegate('.product_id', 'change', function () {
			var tr = $(this).parent().parent();
			var price = tr.find('.product_id option:selected').attr('data-price');
			tr.find('.price').val(price);

			var qty = tr.find('.qty').val() - 0;
			var price = tr.find('.price').val() - 0;

			var total = (qty * price) ;
			tr.find('.amount').val(total);
			totalAmount();
		});
		$('.neworderbody').delegate('.qty', 'keyup', function () {
			var tr = $(this).parent().parent();
			var qty = tr.find('.qty').val() - 0;
			var price = tr.find('.price').val() - 0;

			var total = (qty * price);
			tr.find('.amount').val(total);
			totalAmount();
		});

        $('#hideshow').on('click', function(event) {
			  $('#content').removeClass('hidden');
		  	$('#content').addClass('show');
        $('#content').toggle('show');
        });
	});
</script>

<style>
  .hidden {
    display: none;
  }

  .show {
    display: block !important;
  }

  select.form-control.product_id {
    width: 150px;
  }
</style>
<div class="container">

  <div class="row">
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">New Order</div>

        <div class="panel-body">
          <form class="form-horizontal" id="yoyo" role="form" method="POST" action="{{ route('kasir.store') }}">
            {!! csrf_field() !!}

            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Amount</th>
                  <th>Delete</th>

                </tr>
              </thead>
              <tbody class="neworderbody">
                <tr>
                  <td class="no">1</td>
                  <td>
                    <select class="form-control product_id" name="product_id[]">
                      <option value="" disabled selected>---Pilih---</option>
                      @foreach($barang as $product)
                      <option data-price="{!! $product->harga_jual !!}" value="{!! $product->id !!}">
                        {!! $product->name!!}</option>
                      @endforeach
                    </select>
                  </td>
                  <td>
                    <input type="text" class="qty form-control" name="qty[]" value="{{ old('email') }}">
                  </td>
                  <td>
                    <input type="text" class="price form-control" name="price[]" value="{{ old('email') }}">
                  </td>
                  <td>
                    <input type="text" class="amount form-control" name="amount[]">
                  </td>
                  <td>
                  </td>
                </tr>

              </tbody>

              <tfoot>
                <th colspan="6">Total:<b class="total">0</b></th>
              </tfoot>


            </table>
            <input type="button" class="btn btn-lg btn-primary add" value="Add New Item">
            <hr>

            <td>
              Get Money:
              <input type="text" name="total_bayar" class="getmoney form-control">
            </td>
            <td>
              Back Money:
              <input type="text" name="total_kembalian" class="backmoney form-control">
            </td>
            <hr>
        </div>

      </div>
    </div>
    <!--  Right -->

    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">Actions</div>

        <div class="panel-body">
          <center>
            <button type="submit" form="yoyo" class="btn btn-default btn-lg">
              Save Order
            </button>
            <button type="button" id='hideshow' class="btn btn-primary btn-lg" data-toggle="modal"
              data-target="#myModal">
              Generate Reciept
            </button>
          </center>
        </div>
      </div>
    </div>
    </form>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Reciept</h4>
          </div>
          <div class="modal-body">
            <div class="panel-body " id="toPrint">
              <style>
                tr: {
                  border: 1px black solid;
                }

                ;

                .header-invoice>*: {
                  vertical-align: middle;
                }
              </style>
              <div class="header-invoice mb-3" style="">


                <img src="{{$toko->logo_toko}}" alt=""
                  style="height: 75px; width: 20%;display: inline-block;" srcset=""></td>
            

                <table class="" style="width: 75%;display: inline-block;margin: auto;">

                  <thead>
                    <tr>
                      <td style="width: 50%"></td>


                      <td>Nama Toko :{{ $toko->name }}</td>

                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        Alamat : {{ $toko->alamat }}
                      </td>
                    </tr>
                  </thead>
                </table>
              </div>
              <table class="table table-striped" style="width: 100%">
                <thead class="thead-dark" {{-- style="background-color:#000;color:white;" --}}>
                  <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Order Qty</th>
                    <th>Unit Price</th>
                    <th>Order Amount </th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $i = 0;
                  @endphp
                  @foreach($nota_details as $order)
                  <tr>
                    @php
                    $i++;
                    @endphp
                    <td>{!! $i !!}</td>
                    <td>{!! $order->produks->name !!}</td>
                    <td>{!! $order->qty !!}</td>
                    <td>{!! $order->produks->harga_jual !!}</td>
                    <td>{!! $order->total !!}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @if (isset($nota))
              <table style="width: 100%">
                <tr>
                  <td style="width: 40%"></td>
                  <td style="width: 10%"></td>
                  <td style="width: 30%;text-align:right">Bayar : {{ $nota->total_bayar }}</td>
                  <td style="width: 10%"></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="text-align:right">Total : {{ $nota->total_bayar-$nota->total_kembalian }}</td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="text-align:right">
                    <hr>
                  </td>
                  <td> - </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="text-align:right">Kembalian : {{ $nota->total_kembalian }}</td>
                  <td></td>
                </tr>
              </table>
              @endif

              <a href="javascript:void(0);" class="btn btn-primary" id="printPage">Print</a>

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Row End -->

  <script lang='javascript'>
    $(document).ready(function(){
    $('#printPage').click(function(){
        var data = '<input type="button" value="Print this page" onClick="window.print()">';
        data += '<link href="css/app.css" rel="stylesheet">';
        data += '<div id="toPrint">';
        data += $('#toPrint').html();
        data += '</div>';

        myWindow=window.open('','','width=1200,height=1000');
        myWindow.innerWidth = screen.width;
        myWindow.innerHeight = screen.height;
        myWindow.screenX = 0;
        myWindow.screenY = 0;
        myWindow.document.write(data);
        myWindow.focus();
      });
    });
  </script>
</div>
@endsection
