{{-- loginしていないのでlogin_mainの読み込み --}}
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