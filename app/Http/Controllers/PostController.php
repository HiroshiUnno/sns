<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;


class PostController extends Controller
{
    //
    public function add()
    {
      return view('post.create');
    }

    public function create(Request $request)
    {
      $this -> validate($request, Post::$rules);

      $post = new Post();
      $form = $request->all();

      unset($form['_token']);
      /*
      $str = str_replace('https://youtu.be/',"",$str);
      */
      $post->user_id = $request->user()->id;
      $post->fill($form);
      $post->save();

      return redirect('home/top');
    }

    public function index(Request $request)
    {
      $cond_title = $request->cond_title;

        if ($cond_title != '') {
            $articles = Post::where('title', $cond_title).orderBy('updated_at', 'desc')->get();
        } else {
            $articles = Post::all()->sortByDesc('updated_at');
        }

      $youtube_ids = Post::all();
      $youtube_ids = str_replace('https://youtu.be/',"",$youtube_ids);

      $data = Post::paginate(5);

      return view('home.top', ['articles'=>$articles, 'cond_title'=>$cond_title, 'youtube_ids'=>$youtube_ids, 'data'=>$data]);
    }


    public function delete(Request $request)
  {

      $post = Post::find($request->id);
      $post->delete();
      return redirect('relation/mypage');
  }
}
