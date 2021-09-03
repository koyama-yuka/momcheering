{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main2')

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
            <h3>{{ $user->name }}</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>メールアドレス</h3>
        </div>
        <div class="col-md-3">
            <h3>{{ $user->email }}</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>こどもとの関係性</h3>
        </div>
        <div class="col-md-5">
            @if($user->relationship_id == 1)
                <h3>母親</h3>
            @elseif($user->relationship_id == 2)
                <h3>父親</h3>
            @else
                <h3>その他</h3>
            @endif
            <h3></h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>前日メールの受け取り</h3>
        </div>
        <div class="col-md-5">
            @if($user->notice_flag == 1)
                <h3>受け取る</h3>
            @elseif($user->notice_flag == 0)
                <h3>受け取らない</h3>
            @endif
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-md-3 mx-auto">
            <a class="btn btn-primary btn-lg btn-block" href="/user/edit">編集</a>
        </div>
    </div>
    
    
</div>
@endsection