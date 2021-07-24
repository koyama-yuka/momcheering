{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'あなたの情報')

{{-- contentここから --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <h3>《あなたのデータ》</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>ユーザー名</h3>
        </div>
        <div class="col-md-5">
            <h3>葉月{{-- $admin_users->nameみたいな感じでnewsのときのprofileを参考に --}}</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>メールアドレス</h3>
        </div>
        <div class="col-md-3">
            <h3>あああ@gmail.com</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>こどもとの関係性</h3>
        </div>
        <div class="col-md-5">
            <h3>母親</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>前日メールの受け取り</h3>
        </div>
        <div class="col-md-5">
            <h3>受け取る</h3>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-md-3 mx-auto">
            {{--
            <input type="" name="" value="">
            {{ csrf_field() }}
            --}}
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="編集">
        </div>
    </div>
    
    
</div>
@endsection