<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
  protected $table = 'Incident';
  protected $primaryKey	= 'idIncident';
  public $timestamps = false;

  public function areaIncident(){
    return $this->belongsTo('App\AreaIncident','idAreaIncident');
  }

  public function priority(){
    return $this->belongsTo('App\Priority','idPriority');
  }

}
