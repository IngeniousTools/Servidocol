<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
  protected $table = 'Stock';
  protected $primaryKey	= 'idStock';
  public $timestamps = false;

  public function bill(){
    return $this->belongsTo('App\Bill','idBill');
  }
}
