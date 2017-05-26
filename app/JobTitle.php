<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
  protected $table = 'JobTitle';
  protected $primaryKey	= 'idJobTitle';
  public $timestamps = false;

  public function employee(){
    return $this->belongsTo('App\Employee','idJobTitle');
  }
}
