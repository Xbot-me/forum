<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Favorite;

class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Reply $reply)
    {
      $reply->favorite();
      return back();
     
    }
}
