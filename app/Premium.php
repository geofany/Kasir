<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
  protected $table = 'premiums';
  protected $fillable = ['user_id', 'bukti_bayar', 'approve'];

  public function users()
  {
      return $this->belongsTo('App\User');
  }
}
