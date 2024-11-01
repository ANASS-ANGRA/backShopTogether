<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
  return $request->user();
})->middleware('auth:sanctum');


Route::prefix("category")->controller(CategoryController::class)->group(function () {
  Route::get("getAllcategory", "getAllcategory");
});

Route::prefix("article")->controller(ArticleController::class)->group(function () {
  Route::post("newFastArticle", "newFastArticle");
  Route::get("getArticlePaginate", "getArticlePaginate");
  Route::get("findArticle/{id}", "findArticle");
});

Route::prefix("client")->controller(ClientController::class)->group(function () {
  Route::get("getClientPaginate", "getClientPaginate");
});
Route::prefix("products")->controller(ProductController::class)->group(function () {
  Route::get("findProduitsArticle/{id}", "findProduitsArticle");
});
