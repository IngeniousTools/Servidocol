<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $table = 'User';
  protected $primaryKey	= 'idUser';
  public $timestamps = false;

  public function rol(){
    return $this->belongsTo('App\Rol','idRol');
  }

  public function employee(){
    return $this->belongsTo('App\Employee','idEmployee');
  }

}
