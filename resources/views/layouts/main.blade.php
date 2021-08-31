<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        {{-- 各ページでのtitleタグのための@yield --}}
        <title>@yield('title')</title>
        
        <!-- Scripts -->
        {{-- Laravel標準で用意されているJavascriptの読み込み --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSの読み込み --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        
        {{-- 自分で作成したCSSの読み込み予定 --}}
        
        {{-- カレンダーのためのjsとcss --}}
        <link href="{{ secure_asset('css/lib/main.min.css') }}" rel="stylesheet">
        <script src="{{ secure_asset('js/lib/main.min.js') }}" defer></script>
        <script src="{{ secure_asset('js/lib/locales/ja.js') }}" defer></script>

        
    </head>
    
    <body>
        <div id="app">
            {{-- ナビゲーションバー --}}
            <nav class="navbar navbar-expand-md navbar-light bg-dark" navbar-mom>
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/home') }}?id={{ $display->id }}">子育て応援！母子手帳サポートシステム</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Togglenavigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            
                        </ul>
                        
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            
                            <!-- Authentication Links -->
                            {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                            @guest
                                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        
                                        {{-- 追加してみた箇所--}}
                                        <a class="dropdown-item" href="/home?id={{ $display->id }}">HOME</a>
                                        
                                        <a class="dropdown-item" href="/calendar?id={{ $display->id }}">カレンダー</a>
                                        
                                        <a class="dropdown-item" href="/vaccine?id={{ $display->id }}">予防接種</a>
                                        
                                        <a class="dropdown-item" href="/child?id={{ $display->id }}">こどものデータ</a>
                                        
                                        <a class="dropdown-item" href="/user?id={{ $display->id }}">ユーザーのデータ</a>
                                        
                                        {{-- ここまで --}}
                                        
                                        
                                        {{-- ログアウト --}}
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                            
                        </ul>
                    </div>
                    
                </div>
            </nav>
            {{-- ここまでナビゲーションバー --}}
            
            
            {{-- こどものボタン表示 --}}
            <div class="form-group row">
                
                {{-- こどもの名前ボタン --}}
                    @foreach(Auth::user()->children as $child)
                    
                    <div class="col-md-2">
                    {{--
                    <a class="btn btn-primary btn-lg btn-block" href="{{ url()->current() }}?id={{ $child->id }}" role="button">{{ $child->child_name }}</a>
                    --}}
                    
                    {{-- 選択されてたら色変えるとき　＠yieldで --}}
                    @if($child->id == $display->id)
                        <a class="btn btn-success btn-lg btn-block" href="{{ url()->current() }}?id={{ $child->id }}@yield('get_param')" role="button">{{ $child->child_name }}</a>
                    @else
                        <a class="btn btn-primary btn-lg btn-block" href="{{ url()->current() }}?id={{ $child->id }}@yield('get_param')" role="button">{{ $child->child_name }}</a>
                    @endif
                    
                    </div>
                    @endforeach
                
                
                {{-- 追加ボタン --}}
                <div class="col-md-1">
                    <a class="btn btn-primary btn-lg btn-block" href="/child/add">＋</a>
                </div>
                
            </div>
            
            
            <main class="py-4">
                {{-- コンテンツを入れる場所として@yield --}}
                @yield('content')
            </main>
        </div>
        
        {{-- jqueryの読み込み --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        
        {{-- スケジュールの編集時のチェックボックス有効、無効の処理 --}}
        <script>
            $(function(){
                $('#vaccine_flag_on').click(function() {
                    $('.vaccine_kind').prop('disabled', false);
                })
                $('#vaccine_flag_off').click(function() {
                    $('.vaccine_kind').prop('disabled', true);
                })
                
                $('#medical_flag_on').click(function() {
                    $('input[name="medical_kind"]').prop('disabled', false);
                })
                $('#medical_flag_off').click(function() {
                    $('input[name="medical_kind"]').prop('disabled', true);
                })
            
        </script> 
        
    </body>
</html>