<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canine extends Model
{
  protected $table = 'Canine';
  protected $primaryKey	= 'idCanine';
  public $timestamps = false;
}
