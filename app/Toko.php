<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
  protected $fillable = ['id_user', 'name', 'alamat', 'logo_toko'];

  public function users() {
  return $this->belongsTo('App\User');
}

public function produks() {
return $this->hasMany('App\Produk');
}

public function notas() {
return $this->hasMany('App\Nota');
}

public function penjualans() {
return $this->hasMany('App\Penjualan');
}
}
