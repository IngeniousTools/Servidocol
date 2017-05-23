<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  protected $table = 'Item';
  protected $primaryKey	= 'idItem';
  public $timestamps = false;
}
