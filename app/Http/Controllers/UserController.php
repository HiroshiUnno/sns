<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Relation;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Storage;

class UserController extends Controller
{
    //
    public function add()
    {
      return view('user.mypage');
    }
    //ユーザー取得
    public function show()
    {
      //noimage取得
      $url = Storage::disk('s3')->url("shareyoutube/noimage.png");

      $user_id = Auth::id();
      $user = DB::table('users')->where('id', $user_id)->first();
      //dd($user);
      $posts = DB::table('posts')->where('user_id', $user_id)->orderBy('created_at', 'desc')->get();

      //dd($posts);

    return view('user.mypage', ['user'=>$user, 'user_id'=>$user_id, 'posts'=>$posts, 'url'=>$url]);

    }
    //他のユーザーを取得
    public function index(User $user)
    {
      $all_users = $user->getAllUsers(auth()->user()->id);

        return view('relation.users', ['all_users'  => $all_users]);
    }
    //フォローする
    public function follow(User $user)
    {
      //dd($user->id);
      $follower = Auth::user();
      $is_following = $follower->isFollowing($user->id);
      //dd($user->id);
      if(!$is_following){
        $follower->follow($user->id);

        return back();
      }
    }
    //フォローを外す
    public function unfollow(User $user)
    {
      Auth::user()->unfollow($user->id);

        return back();
    }
}
