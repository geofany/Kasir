<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
  protected $fillable = ['kode_penjualan', 'id_toko', 'total_bayar', 'total_keuntungan'];

  public function tokos() {
  return $this->belongsTo('Kasir\Toko');
}
public function penjualans() {
return $this->hasMany('Kasir\Penjualan');
}
}
