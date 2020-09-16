<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relation;
use App\Post;
use App\User;
use Carbon\Carbon;

class RelationController extends Controller
{
    //
    public function add()
    {
      return view('relation.friend');
    }

    public function index(Request $request)
    {

    }


}
