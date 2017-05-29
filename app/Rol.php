<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
  protected $table = 'Rol';
  protected $primaryKey	= 'idRol';
  public $timestamps = false;

  public function user(){
    return $this->belongsTo('App\User','idRol');
  }
}
