<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
  protected $fillable = ['kode_penjualan', 'id_produk', 'id_toko', 'qty', 'total', 'keuntungan'];

  public function produks() {
  return $this->belongsTo('App\Produk');
}
public function notas()
{
  return $this->belongsTo('App\Nota');
}
public function tokos() {
return $this->belongsTo('App\Toko');
}
}
