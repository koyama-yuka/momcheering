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
                    <label class="col-md-3" for="user_name">ユーザー名（必須）</label>
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
                    <label class="col-md-3" for="email">メールアドレス（必須）</label>
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
                    <label class="col-md-3" for="current_password">現在のパスワード（必須）</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                        @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="new_password">新しいパスワード（任意）</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" id="new_password" name="new_password">
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="new_password_confirmation">新しいパスワード確認（新しく設定の際は必須）</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="relationship">こどもとの関係性（必須）</label>
                    <div class="col-md-9">
                        <select class="form-control" name="relationship">
                            <option value="">選択してください</option>
                            <option value="1" @if($user->relationship_id == 1) selected @endif>母親</option>
                            <option value="2" @if($user->relationship_id == 2) selected @endif>父親</option>
                            <option value="3" @if($user->relationship_id == 3) selected @endif>その他</option>
                        </select>
                        @error('relationship_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="password">前日メールの受け取り（必須）</label>
                    <div class="col-md-9 radio-inline">
                        <input type="radio" value="1" name="notice_flg" id="necessary" {{ ($user->notice_flag == 1) ? "checked" : "" }}>
                        <label for="yes">受け取る</label>
                        
                        <input type="radio" value="2" name="notice_flg" id="unnecessary" {{ ($user->notice_flag == 0) ? "checked" : "" }}>
                        <label for="no">受け取らない</label>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <div class="col-md-3">
                        <a class="btn btn-primary btn-lg btn-block" href="/home?id={{ $display->id }}">ホームへ</a>
                    </div>
                    <div class="col-md-3">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="　更新　">
                    </div>
                </div>
                
                
            </form>
        </div>
        
    
        
    </div>


@endsection