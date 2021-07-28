{{-- loginしていないのでlogin_mainの読み込み --}}
@extends('layouts.login_main')

{{-- title --}}
@section('title', 'ユーザー新規登録')

{{-- contentここから --}}
@section('content')
<div class="container">
    
    {{-- ユーザーの情報登録 --}}
    <div class="row">
        <div class="col-md-4 mx-auto">
            <h3>《ユーザーの情報登録》</h3>
        </div>
    </div>
    
    <div class="register_body">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="form-group row">
                <label class="col-md-3" for="user_name">ユーザー名</label>
                <div class="col-md-5">
                    <input id="user_name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('user_name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-3" for="email">メールアドレス</label>
                <div class="col-md-5">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-3" for="password">パスワード</label>
                <div class="col-md-5">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-3" for="password-confirm">パスワード確認</label>
                <div class="col-md-5">
                    <input id="password-confirm" type="password" class="form-control" name="password-confirmation" required autocomplete="new-password">
                </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        </form>
    </div>
    
    
    
    
    
        
    
        
    
        
    <div class="form-group row">
        <label class="col-md-3" for="relationship">こどもとの関係性</label>
        <div class="col-md-3">
            <select class="form-control" name="relationship">
                <option value="">選択してください</option>
                <option value="1">母親</option>
                <option value="2">父親</option>
                <option value="3">その他</option>
            </select>
        </div>
    </div>
        
    <div class="form-group row">
        <label class="col-md-3" for="password">前日メールの受け取り</label>
        <div class="col-md-6 radio-inline">
            <input type="radio" value="1" name="notice_flg" id="yes">
            <label for="yes">受け取る</label>
                
            <input type="radio" value="2" name="notice_flg" id="no">
            <label for="no">受け取らない</label>
        </div>
    </div>
    
    {{-- こどもの情報登録 --}}
    <div class="row">
        <div class="col-md-4 mx-auto">
            <h3>《こどもの情報登録》</h3>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3" for="child_name">こどもの名前</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="child_name">
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3" for="gender">性別</label>
        <div class="col-md-3">
            <select class="form-control" name="gender">
                <option value="">選択してください</option>
                <option value="1">男の子</option>
                <option value="2">女の子</option>
                <option value="3">その他</option>
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3" for="birthday">生年月日</label>
        <div class="col-md-2">
            <select class="form-control" name="year"> 年  {{-- 横に来るようにする　月、日も --}}
                <option value="">選択してください</option>  {{-- 後で入れる方法考える --}}
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control" name="month"> 月
                <option value="">選択してください</option>  {{-- 後で入れる方法考える --}}
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control" name="day"> 日
                <option value="">選択してください</option>  {{-- 後で入れる方法考える --}}
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3" for="blood_type">血液型</label>
        <div class="col-md-3">
            <select class="form-control" name="blood_type">
                <option value="">選択してください</option>  {{-- 後で入れる方法考える --}}
                <option value="1">A型</option></option>
                <option value="2">B型</option>
                <option value="3">O型</option>
                <option value="4">AB型</option>
                <option value="5">不明</option>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-control" name="blood_rh">
                <option value="">選択してください</option>  {{-- 後で入れる方法考える --}}
                <option value="1">+</option>
                <option value="2">-</option>
                <option value="3">不明</option>
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3" for="birth_weight">出生体重</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="birth_weight"> g  {{-- 横に来るようにする --}}
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3" for="birth_height">出生身長</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="birth_height"> cm  {{-- 横に来るようにする --}}
        </div>
    </div>
        
        
    <div class="form-group row">
        <div class="col-md-3 mx-auto">
            {{--
            <input type="" name="" value="">
            {{ csrf_field() }}
            --}}
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="戻る">
        </div>
        <div class="col-md-3 mx-auto">
            {{--
            <input type="" name="" value="">
            {{ csrf_field() }}
            --}}
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="登録">
        </div>
    </div>
    
    
</div>


@endsection




{{-- authでできたregisterの分↓

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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