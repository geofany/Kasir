<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $fillable = ['user_id', 'name', 'alamat', 'logo_toko'];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function produks()
    {
        return $this->hasMany('App\Produk');
    }

    public function notas()
    {
        return $this->hasMany('App\Nota');
    }

    public function nota_details()
    {
        return $this->hasMany('App\Nota_detail');
    }
}
