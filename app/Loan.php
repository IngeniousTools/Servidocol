<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
  protected $table = 'Loan';
  protected $primaryKey	= 'idLoan';
  public $timestamps = false;
}
