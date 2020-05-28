<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
  protected $fillable = ['id_user', 'name', 'alamat', 'logo_toko'];

  public function users() {
  return $this->belongsTo('Kasir\User');
}

public function produks() {
return $this->hasMany('Kasir\Produk');
}

public function notas() {
return $this->hasMany('Kasir\Nota');
}

public function penjualans() {
return $this->hasMany('Kasir\Penjualan');
}
}
