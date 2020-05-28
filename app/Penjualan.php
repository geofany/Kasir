<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
  protected $fillable = ['kode_penjualan', 'id_produk', 'id_toko', 'qty', 'total', 'keuntungan'];

  public function produks() {
  return $this->belongsTo('Kasir\Produk');
}
public function notas()
{
  return $this->belongsTo('Kasir\Nota');
}
public function tokos() {
return $this->belongsTo('Kasir\Toko');
}
}
