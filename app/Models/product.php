<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
  protected $fillable = [
    "category_id",
    "article_Id",
    "nomProduit",
    "quantite"
  ];

 public function category(){
  return $this->belongsTo(category::class , "category_id");
 }
}
