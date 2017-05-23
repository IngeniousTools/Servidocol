<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeCustomer extends Model
{
  protected $table = 'TypeCustomer';
  protected $primaryKey	= 'idTypeCustomer';
  public $timestamps = false;
}
