<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
  protected $fillable = [
    "fullName" ,
    "NumberPhone",
    "Email"
  ];

public function Articles(){
  return $this->hasMany(article::class ,"clientId");
}
}
