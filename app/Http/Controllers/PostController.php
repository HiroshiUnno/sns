<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
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

      $form['url'] = str_replace('https://youtu.be/',"",$form['url']);
        //dd($form['url']);


      $post->user_id = $request->user()->id;
      $post->fill($form);
      $post->save();

      return redirect('/');
    }

    public function index(Request $request)
    {
      $cond_title = $request->cond_title;
      $articles = User::all();

        if ($cond_title != '') {
            $articles = Post::where('title', $cond_title).orderBy('updated_at', 'desc')->get();
        } else {
            $articles = Post::all()->sortByDesc('updated_at');
        }

      $data = Post::paginate(5);

      //dd($youtube_ids);

      return view('home.top', ['articles'=>$articles, 'cond_title'=>$cond_title, 'data'=>$data]);
    }


    public function delete(Request $request)
  {

      $post = Post::find($request->id);
      $post->delete();
      return redirect('/mypage');
  }
}
