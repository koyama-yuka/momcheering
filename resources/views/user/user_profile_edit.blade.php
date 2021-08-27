{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'プロフィール編集')

{{-- contentここから --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h3>《あなたのデータ》</h3>
            </div>
        </div>
        
        
        <div class="update-body">
            <form method="POST" action="{{ action('Users\UserController@profileUpdate') }}">
                @csrf
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="user_name">ユーザー名</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" id="user_name" value="{{ $user->name }}" required>
                        @error('user_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-3" for="email">メールアドレス</label>
                    <div class="col-md-9">
                        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="password">現在のパスワード</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="newpassword">新しいパスワード</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="newpassword">
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="newpassword">新しいパスワード確認</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password_check">
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="relationship">こどもとの関係性</label>
                    <div class="col-md-9">
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
                    <div class="col-md-9 radio-inline">
                        <input type="radio" value="1" name="notice_flg" id="yes">
                        <label for="yes">受け取る</label>
                        
                        <input type="radio" value="2" name="notice_flg" id="no">
                        <label for="no">受け取らない</label>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <div class="col-md-3">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="キャンセル">
                    </div>
                    <div class="col-md-3">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="　更新　">
                    </div>
                </div>
                
                
            </form>
        </div>
        
    
        
    </div>


@endsection