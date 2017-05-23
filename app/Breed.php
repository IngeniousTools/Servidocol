<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
  protected $table = 'Breed';
  protected $primaryKey	='idBreed';
  public $timestamps = false;
}
