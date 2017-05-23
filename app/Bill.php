<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
  protected $table = 'Bill';
  protected $primaryKey	= 'idBill';
  public $timestamps = false;
}
