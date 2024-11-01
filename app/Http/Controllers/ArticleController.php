<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Http\Requests\StorearticleRequest;
use App\Http\Requests\UpdatearticleRequest;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\client;



class ArticleController extends Controller
{
  function newFastArticle(Request $request)
  {
    $clientData = $request->input('clientInformation');
    $productsData = $request->input('Produits');

    $client = Client::create([
      'fullName' => $clientData['fullName'],
      'NumberPhone' => $clientData['phoneNumber'],
      'Email' => $clientData['email'],
    ]);

    $article = article::create([
      "name" => $clientData['Article'],
      "clientId" => $client->id
    ]);

    foreach ($productsData as $product) {
      Product::create([
        'idCategory' => $product['category'],
        'nomProduit' => $product['produit'],
        'quantite' => $product['quantity'],
        "category_id" => $product["category"],
        'article_Id' => $article->id,
      ]);
    }

    return response()->json(['message' => 'Order created successfully']);
  }


  function getArticlePaginate(Request $request)
  {
    return response()->json(article::with("client")->paginate($request->input("perPage", 10)));
  }

  function findArticle(Request $request, $id)
  {
    return response()->json(article::with(["Product", "Product.category"])->paginate($request->input("perPage", 10)));
  }
}
