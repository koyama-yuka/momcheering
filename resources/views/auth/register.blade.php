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
    
    <div class="register-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            
            <div class="form-group row">
                <label class="col-md-3" for="user_name">ユーザー名</label>
                <div class="col-md-5">
                    <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" placeholder="ユーザー名" autofocus>
                    @error('user_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            
            <div class="form-group row">
                <label class="col-md-3" for="email">メールアドレス</label>
                <div class="col-md-5">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="メールアドレス">
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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="パスワード">
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
                    <input id="password-confirm" type="password" class="form-control" name="password-confirmation" required autocomplete="new-password" placeholder="パスワードの確認のため再度入力してください">
                </div>
            </div>
            
            
            <div class="form-group row">
                <label class="col-md-3" for="relationship">こどもとの関係性</label>
                <div class="col-md-3">
                    <select id="relationship" class="form-control" name="relationship" required>
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
                    <input type="radio" value="1" name="notice_flg" id="yes" value="1">
                    <label for="yes">受け取る</label>
                
                    <input type="radio" value="2" name="notice_flg" id="no" value="0">
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
                    <input id="child_name" type="text" class="form-control @error('child_name') is-invalid @enderror" name="child_name" value="{{ old('child_name') }}" required autocomplete="child_name" placeholder="こどもの名前">
                    @error('child_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            
            <div class="form-group row">
                <label class="col-md-3" for="gender">性別</label>
                <div class="col-md-3">
                    <select id="gender" class="form-control" name="gender" required>
                        <option value="">性別を選択してください</option>
                        <option value="1">男の子</option>
                        <option value="2">女の子</option>
                        <option value="3">その他</option>
                    </select>
                </div>
            </div>
            
            
            <div class="form-group row"> {{-- あまり美しくないなぁ・・・ということで再考の必要性あり --}}
                <label class="col-md-3" for="birthday">生年月日</label>
                <div class="col-md-3">
                    <input id="birthday" type="date" name="birthday" required>
                </div>
            </div>
            
            
            <div class="form-group row">
                <label class="col-md-3" for="blood_type">血液型</label>
                <div class="col-md-3">
                    <select id="blood_type" class="form-control" name="blood_type" required>
                        <option value="">血液型を選択してください</option>
                        <option value="1">A型</option></option>
                        <option value="2">B型</option>
                        <option value="3">O型</option>
                        <option value="4">AB型</option>
                        <option value="5">不明</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select id="blood_rh" class="form-control" name="blood_rh" required>
                        <option value="">Rhを選択してください</option>
                        <option value="1">+</option>
                        <option value="2">-</option>
                        <option value="3">不明</option>
                    </select>
                </div>
            </div>
            
            
            <div class="form-group row">
                <label class="col-md-3" for="birth_weight">出生体重</label>
                <div class="col-md-5" style="display:inline-flex">
                    <input id="birth_weight" type="text" class="col-md-10 form-control @error('birth_weight') is-invalid @enderror" name="birth_weight" value="{{ old('birth_weight') }}" required autocomplete="birth_weight" placeholder="出生体重"> <span class="col-md-2" style="margin-left: 15px;">g</span>  {{-- 横に来るようにする --}}
                    @error('birth_weight')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            
            <div class="form-group row">
                <label class="col-md-3" for="birth_height">出生身長</label>
                <div class="col-md-5" style="display:inline-flex">
                    <input id="birth_height" type="text" class="col-md-10 form-control @error('birth_height') is-invalid @enderror" name="birth_height" value="{{ old('birth_height') }}" required autocomplete="birth_height" placeholder="出生身長"> <span class="col-md-2" style="margin-left: 15px;">cm</span>  {{-- 横に来るようにする --}}
                    @error('birth_height')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            
            <div class="form-group row">
                <div class="col-md-3 mx-auto">
                    <input type="button" class="btn btn-primary btn-lg btn-block" onclick="history.back(-1)" value="戻る">
                </div>
                
                <div class="col-md-3 mx-auto">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="登録">
                </div>
            </div>
            
            
            
        </form>
    </div>
    
    {{-- 一旦コメントアウト
    
    <div class="form-group row">
        <label class="col-md-3" for="birthday">生年月日</label>
        <div class="col-md-2">
            <select class="form-control" name="year"> 年 
                <option value="">選択してください</option>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control" name="month"> 月
                <option value="">選択してください</option> 
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control" name="day"> 日
                <option value="">選択してください</option>
            </select>
        </div>
    </div>
    
    ここまで--}}
    
</div>


@endsection








{{--  authでできたregisterの分↓

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
                                <input id="name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="名前" autofocus>

                                @error('user_name')
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