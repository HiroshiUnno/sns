<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Relation;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
    //
    public function add()
    {
      return view('user.mypage');
    }

    public function index()
    {
      //$user = DB::table('users')->where('id', $user_id)->first();
      $user_id = Auth::id();
      //dd($user_id);
      $posts = DB::table('posts')->where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
      

      //dd($posts);
      //$posts = DB::table('posts');

    return view('user.mypage', ['user_id'=>$user_id, 'posts'=>$posts]);

    }
}
