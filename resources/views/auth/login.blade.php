{{-- loginしていないのでlogin_mainの読み込み --}}
@extends('layouts.login_main')

{{-- title --}}
@section('title', 'ログイン')

{{-- contentここから --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6-md mx-auto">
            <h2>子育て応援！母子手帳サポートシステム</h2>
        </div>
    </div>
    
    <div class="login-box card">
        <div class="login-header card-header mx-auto">{{ __('messages.Login') }}</div>
        <div class="login-body card-bory">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group row">
                    <label class="col-md-3" for="email">{{ __('messages.E-Mail Address') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="メールアドレス" value="{{ old('email') }}" autocomplete="email" required autofocus>
                        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-3" for="password">{{ __('messages.Password') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="パスワード" autocomplete="current-password" required>
                        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="checkbox">
                            <label><input type="checkbox" name="remember"{{ old('remember') ? 'checked' : '' }}> {{ __('messages.Remember Me') }}</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-5 mx-auto">
                        <button type="submit" class="btn btn-main-content btn-block">{{ __('messages.Login') }}</button>
                    </div>
                </div>
                
            </form>
            
            <div class="form-group row">
                <div class="col-5 mx-auto">
                    <button type="button" class="btn btn-main-content btn-block" onclick="location.href='/register'">新規登録の方はこちら</button>
                </div>
            </div>
            
        </div>
    </div>
    
</div>

@endsection