<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
  protected $table = 'Incident';
  protected $primaryKey	= 'idIncident';
  public $timestamps = false;
}
