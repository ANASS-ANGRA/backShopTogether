<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
  protected $fillable = [
  "name",
  "clientId",
  ];


  public function client (){
    return $this->belongsTo(client::class , "clientId");
  }

  public function Product () {
    return $this->hasMany(Product::class ,  "article_Id");
  }
}
