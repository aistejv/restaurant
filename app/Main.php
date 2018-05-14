<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
  protected $fillable =['title'];

  public function dishes(){
    return $this->hasMany(Dish::class);
  }
}
