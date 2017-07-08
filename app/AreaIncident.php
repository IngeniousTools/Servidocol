<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaIncident extends Model
{
  protected $table = 'AreaIncident';
  protected $primaryKey	='idAreaIncident';
  public $timestamps = false;

  public function incident(){
    return $this->belongsTo('App\Incident','idIncident');
  }
}
