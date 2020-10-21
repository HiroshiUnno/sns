@extends('layouts.sample')

@section('title', 'トップページ')

@section('content')
<div class="container">
    <hr color="#c0c0c0">
          <div class="col-md-8">
              <form action="{{ action('PostController@index') }}" method="get">
                  <div class="form-group row">
                      <label class="col-md-2">タイトル</label>
                      <div class="col-md-8">
                          <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                      </div>
                      <div class="col-md-2">
                          {{ csrf_field() }}
                          <input type="submit" class="btn btn-primary" value="検索">
                      </div>
                  </div>
              </form>
          </div>
        <div class="row">
            <div class="articles col-md-8 mx-auto mt-3">
                @foreach($articles as $article)
                    <div class="article">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $article->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="thumbnail">
                                    {{-- <img src="/storage/user/{{ $article->icon_img }}" class="rounded-circle" width="30" height="30"> --}}
                                </div>
                                <div class="name">
                                    ＠{{ Str::limit($article->user_id, 150) }}
                                </div>
                                <div class="title">
                                    {{ Str::limit($article->title, 150) }}
                                </div>
                                <div class="content mt-3">
                                    {{ Str::limit($article->content, 1500) }}
                                </div>　　　　　　　　　　　　　　　
                                <div class="url col-md-6 text-right mt-4">
                                     <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $article->url }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
<<<<<<< HEAD
                {{-- $articles->links() --}}
=======
                {{ $articles->links() }}
>>>>>>> origin/master
            </div>
        </div>
  <hr color="#c0c0c0">
</div>
@endsection
