<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  protected $table = 'Brand';
  protected $primaryKey	='idBrand';
  public $timestamps = false;

  public function bill(){
    return $this->belongsTo('App\Bill','idBill');
  }
}
