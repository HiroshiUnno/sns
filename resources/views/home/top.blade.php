@extends('layouts.layout')

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
                                <div class="title">
                                    {{ Str::limit($article->title, 150) }}
                                </div>
                                <div class="content mt-3">
                                    {{ Str::limit($article->content, 1500) }}
                                </div>　
                                @foreach((array)$youtube_ids as $youtube_id)　　　　　　　　　　　　　　　　
                                  <div class="url col-md-6 text-right mt-4">
                                     <iframe width="560" height="315" src="https://www.youtube.com/embed/.{{ $youtube_id }}" frameborder="0" allowfullscreen></iframe>';
                                  </div>
                                @endforeach
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
