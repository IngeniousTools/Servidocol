<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
  protected $table = 'Item';
  protected $primaryKey	= 'idItem';
  public $timestamps = false;

  public function category(){
    return $this->belongsTo('App\Category','idCategory');
  }

  public function deposit(){
    return $this->belongsTo('App\Deposit','idDeposit');
  }

  public function bill(){
    return $this->belongsTo('App\Bill','idBill');
  }
}
