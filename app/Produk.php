<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['toko_id', 'name', 'harga_jual', 'harga_beli', 'stok'];

    public function tokos()
    {
        return $this->belongsTo('App\Toko');
    }

    public function nota_details()
    {
        return $this->hasMany('App\Nota_detail');
    }
}
