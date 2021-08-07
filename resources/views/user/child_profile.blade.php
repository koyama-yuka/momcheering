{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'こどもの情報')

{{-- contentここから --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <h3>《{{ Auth::user()->name }}のこどものデータ》</h3>  {{-- 後でこどもの名前が出るようにする --}}
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>こどもの名前</h3>
        </div>
        <div class="col-md-5">
            <h3>文月{{-- $admin_users->nameみたいな感じでnewsのときのprofileを参考に --}}</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>性別</h3>
        </div>
        <div class="col-md-3">
            <h3>女の子</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>生年月日</h3>
        </div>
        <div class="col-md-5">
            <h3>2020年　4月　1日</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>血液型</h3>
        </div>
        <div class="col-md-5">
            <h3>B型　Rh不明</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>出生時体重</h3>
        </div>
        <div class="col-md-3">
            <h3>3200 g</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>出生時身長</h3>
        </div>
        <div class="col-md-3">
            <h3>48.5 cm</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>アレルギー</h3>
        </div>
        <div class="col-md-5">
            <h3>未登録</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>今までにかかった主な病気</h3>
        </div>
        <div class="col-md-5">
            <h3>手足口病</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>メモ</h3>
        </div>
        <div class="col-md-5">
            <h3>うさぎのマークのグッズは文月用</h3>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-md-3 mx-auto">
            <a href="">
                <button type="button" class="btn btn-danger btn-lg btn-block">削除</button>
            </a>
            <!--
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="削除">
            -->
        </div>
        <div class="col-md-3 mx-auto">
        <!--
            <input type="" name="" value="">
            {{ csrf_field() }}
        -->
            <a href="/child/edit?id={{ $id }}">
                <button type="button" class="btn btn-primary btn-lg btn-block">編集</button>
            </a>
            <!--            
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="編集">        
            -->
        </div>
    </div>
    
    
</div>
@endsection