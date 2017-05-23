<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
  protected $table = 'Person';
  protected $primaryKey	= 'idPerson';
  public $timestamps = false;
}
