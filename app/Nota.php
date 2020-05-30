<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $fillable = ['toko_id', 'total_bayar', 'total_kembalian', 'total_keuntungan'];

    public function tokos()
    {
        return $this->belongsTo('App\Toko', 'toko_id');
    }
    public function nota_details()
    {
        return $this->hasMany('App\Nota_detail', 'nota_id');
    }
}
