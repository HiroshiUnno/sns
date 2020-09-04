@extends('layouts.layout')

@section('title', 'トップページ')

@section('content')
<div class="container">
  <hr color="#c0c0c0">
        <div class="row">
            <div class="articles col-md-8 mx-auto mt-3">
                @foreach($articles as $article)
                    <div class="article">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $article->updated_at->format('Y年m月d日') }}
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
                {{ $data->links() }}
            </div>
        </div>
  <hr color="#c0c0c0">
</div>
@endsection
