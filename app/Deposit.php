<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
  protected $table = 'Deposit';
  protected $primaryKey	= 'idDeposit';
  public $timestamps = false;

  public function element(){
    return $this->belongsTo('App\Element','idItem');
  }
}
