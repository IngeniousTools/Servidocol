<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentProperty extends Model
{
  protected $table = 'IncidentProperty';
  protected $primaryKey	= 'idIncidentProperty';
  public $timestamps = false;
}
