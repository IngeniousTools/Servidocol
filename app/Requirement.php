<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
  protected $table = 'Requirement';
  protected $primaryKey	= 'idRequirement';
  public $timestamps = false;
}
