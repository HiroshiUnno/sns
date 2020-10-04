@extends('layouts.sample')

@section('title', 'プロフィール編集')

@section('content')
<div class="container">
    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

      <div class="topWrapper">
        @if(!empty($profile->icon_img))
          <img src="/storage/user/{{ $profile->icon_img }}" class="editThumbnail">
        @else
          画像なし
        @endif
      </div>

        <form method="post" action="{{ route('update') }}" enctype="multipart/form-data">
          {{ csrf_field() }}

            <input type="hidden" name="user_id" value="{{ $profile->id }}">
             @if($errors->has('user_id'))
               <div class="error">{{ $errors->first('user_id') }}</div>
             @endif

                 <div class="labelTitle">アカウント名</div>

                  <div>
                    <input type="text" class="userForm" name="name" placeholder="User" value="{{ $profile->name }}">
                      @if($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                      @endif
                  </div>

                    <div class="labelTitle">自己紹介</div>

                      <div>
                        <input type="text" class="userForm" name="introduction" placeholder="User" value="{{ $profile->introduction }}">
                        @if($errors->has('name'))
                          <div class="error">{{ $errors->first('introduction') }}</div>
                        @endif
                      </div>

                        <div class="labelTitle">サムネイル</div>

                          <div>
                            <input type="file" name="icon_img">
                          </div>

                            <div class="buttonSet">
                              <input type="submit" name="send" value="ユーザー変更" class="btn btn-primary btn-sm btn-done">
                                <a href="{{ url('/mypage') }}" class="btn btn-primary btn-sm">戻る</a>
                            </div>
        </form>
</div>
@endsection
