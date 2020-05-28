<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
  protected $fillable = ['id_toko', 'name', 'harga_jual', 'harga_beli', 'stok'];

  public function tokos() {
  return $this->belongsTo('App\Toko');
}

public function penjualans()
{
  return $this->hasMany('App\Penjualan');
}
}
