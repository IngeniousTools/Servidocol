<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkStation extends Model
{
  protected $table = 'WorkStation';
  protected $primaryKey	= 'idWorkStation';
  public $timestamps = false;
}
