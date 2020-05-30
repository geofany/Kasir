<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $fillable = ['user_id', 'name', 'alamat', 'logo_toko'];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function produks()
    {
        return $this->hasMany('App\Produk', 'toko_id');
    }

    public function notas()
    {
        return $this->hasMany('App\Nota', 'toko_id');
    }

    public function nota_details()
    {
        return $this->hasMany('App\Nota_detail', 'toko_id');
    }
}
