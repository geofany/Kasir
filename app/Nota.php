<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
  protected $fillable = ['kode_penjualan', 'id_toko', 'total_bayar', 'total_keuntungan'];

  public function tokos() {
  return $this->belongsTo('App\Toko');
}
public function penjualans() {
return $this->hasMany('App\Penjualan');
}
}
