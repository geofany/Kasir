<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota_detail extends Model
{
  protected $fillable = ['nota_id', 'produk_id', 'qty', 'total', 'keuntungan'];

  public function produks() {
  return $this->belongsTo('App\Produk');
}
public function notas()
{
  return $this->belongsTo('App\Nota');
}
}
