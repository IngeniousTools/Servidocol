<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = 'Category';
  protected $primaryKey	='idCategory';
  public $timestamps = false;

  public function element(){
    return $this->belongsTo('App\Element','idItem');
  }
}
