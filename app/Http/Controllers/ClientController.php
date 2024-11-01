<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Http\Requests\StoreclientRequest;
use App\Http\Requests\UpdateclientRequest;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Http\Request;

class ClientController extends Controller
{
  function getClientPaginate(Request $request)
  {
    return response()->json(client::with("Articles")->paginate($request->input("perPage")));
  }
}
