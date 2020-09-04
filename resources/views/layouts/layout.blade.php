<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/top.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'ShareYouTube') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav4">
                      <ul class="nav navbar-nav navbar-right">
				　　　　　　　　　　<li class="dropdown">
					　　　　　　　　　　<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">メニュー <span class="caret"></span></a>
					　　　　　　　　　　<ul class="dropdown-menu" role="menu">
						　　　　　　　　　　　　<li><a href="{{ url('/loginForm') }}">ログイン</a></li>
						　　　　　　　　　　　　<li><a href="{{ url('/registerForm') }}">アカウント作成</a></li>
            　　　　　　　　　　　　<li><a href="{{ url('/post/create') }}">新規投稿</a></li>
                                <li><a href="{{ url('/mypage') }}">マイページ</a></li>
				　　　　　　　　　　	</ul>
				　　　　　　　　　　</li>
		　　　	　　　　　　　</ul>
                    </div>
                </div>
            </nav>
            {{-- ここまでナビゲーションバー --}}

            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                @yield('content')
            </main>
        </div>
    </body>
</html>
