<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchedulePerson extends Model
{
  protected $table = 'SchedulePerson';
  protected $primaryKey	= 'idSchedulePerson';
  public $timestamps = false;
}
