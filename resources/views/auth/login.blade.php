{-- loginしていないのでlogin_mainの読み込み --}}
@extends('layouts.login_main')

{{-- title --}}
@section('title', 'ログイン')

{{-- contentここから --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6-md mx-auto">
            <h2>子育て応援！<br>母子手帳サポートシステム</h2>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3" for="email">メールアドレス</label>
        <div class="col-md-6">
            <input type="email" class="form-control" name="email" placeholder="メールアドレス">
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3" for="password">パスワード</label>
        <div class="col-md-6">
            <input type="password" class="form-control" name="password" placeholder="パスワード">
        </div>
    </div>
    
    <div class="form-group row">
         <div class="col-md-3 mx-auto">
            {{--
            <input type="" name="" value="">
            {{ csrf_field() }}
            --}}
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="ログイン">
        </div>
    </div>
    
    <div class="form-group row">
         <div class="col-md-3 mx-auto">
            {{--
            <input type="" name="" value="">
            {{ csrf_field() }}
            --}}
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="新規登録">
        </div>
    </div>
</div>

@endsection



{{-- authでできたloginの分↓

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('messages.Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.assword') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('messages.Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('messages.Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}