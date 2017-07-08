<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentProperty extends Model
{
  protected $table = 'IncidentProperty';
  protected $primaryKey	= 'idIncidentProperty';
  public $timestamps = false;

  public function user(){
    return $this->belongsTo('App\User','idUser');
  }

  public function incident(){
    return $this->belongsTo('App\Incident','idIncident');
  }
}
