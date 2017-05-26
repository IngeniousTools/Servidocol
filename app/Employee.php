<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  protected $table = 'Employee';
  protected $primaryKey	= 'idEmployee';
  public $timestamps = false;

  public function jobtitle(){
    return $this->belongsTo('App\JobTitle','idJobTitle');
  }
}
