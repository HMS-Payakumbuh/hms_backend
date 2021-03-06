<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasiLLab extends Model
{
  protected $table = 'hasil_lab';

  public function tindakan() {
    return $this->belongsTo('App\Tindakan', 'id_tindakan', 'id');
  }

  public function transaksi() {
    return $this->belongsTo('App\Transaksi', 'id_transaksi', 'id');
  }
}
