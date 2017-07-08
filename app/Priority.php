<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
  protected $table = 'Priority';
  protected $primaryKey	= 'idPriority';
  public $timestamps = false;

  public function incident(){
    return $this->belongsTo('App\Incident','idIncident');
  }
}
