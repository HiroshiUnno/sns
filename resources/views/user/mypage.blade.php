@extends('layouts.sample')

@section('title', 'マイページ')

@section('content')
<div class="container">
  <hr color="#c0c0c0">
    <h1>シェア一覧</h1>
    <p><input type="button" onclick="location.href='{{ url('/post/create') }}'" value="新規投稿"></p>
        <div class="row">
            <div class="articles col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="article">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{-- $post->updated_at->format('Y年m月d日') --}}
                                </div>
                                <div class="title">
                                    {{ Str::limit($post->title, 150) }}
                                </div>
                                <div class="content mt-3">
                                    {{ Str::limit($post->content, 1500) }}
                                </div>　　　　　　　　　　　　　　　　　
                                <div class="url col-md-6 text-right mt-4">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $post->url }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <form action="{{ action('PostController@delete', ['id' => $post->id]) }}" method="POST">
                               {{ csrf_field() }}
                                    <input type="submit" value="削除" class="btn btn-danger btn-sm btn-dell">
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
  <hr color="#c0c0c0">
</div>
@endsection
