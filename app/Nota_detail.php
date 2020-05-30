<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota_detail extends Model
{
    protected $fillable = ['nota_id', 'produk_id', 'qty', 'total'];

    public function produks()
    {
        return $this->belongsTo('App\Produk', 'produk_id');
    }

    public function notas()
    {
        return $this->belongsTo('App\Nota', 'nota_id');
    }
}
