<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
  protected $table = 'Bill';
  protected $primaryKey	= 'idBill';
  public $timestamps = false;

  public function element(){
    return $this->belongsTo('App\Element','idItem');
  }
  public function brand(){
    return $this->belongsTo('App\Brand','idBrand');
  }

  public function stock(){
    return $this->hasOne('App\Stock','idBill','idBill');
  }
}
