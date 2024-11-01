<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  function findProduitsArticle(Request $request, $id)
  {
    return response()->json(product::where("article_Id", $id)->with("category")->paginate($request->input("perPage", 10)));
  }
}
