{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'こどもの情報')

{{-- contentここから --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <h3>《{{ $display->child_name }}のデータ》</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>こどもの名前</h3>
        </div>
        <div class="col-md-5">
            <h3>{{ $display->child_name }}</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>性別</h3>
        </div>
        <div class="col-md-3">
            <h3>{{ $display->gender_id }}</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>生年月日</h3>
        </div>
        <div class="col-md-5">
            <h3>{{ $display->birthday }}</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>血液型</h3>
        </div>
        <div class="col-md-5">
            <h3>{{ $display->blood_type_id }}　Rh{{$display->blood_rh_id}}</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>出生時体重</h3>
        </div>
        <div class="col-md-3">
            <h3>{{ $display->birth_weight }} g</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>出生時身長</h3>
        </div>
        <div class="col-md-3">
            <h3>{{ $display->birth_height }} cm</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>アレルギー</h3>
        </div>
        <div class="col-md-5">
            <h3>{{ $display->allergy }}</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>今までにかかった主な病気</h3>
        </div>
        <div class="col-md-5">
            <h3>{{ $display->sick }}</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <h3>メモ</h3>
        </div>
        <div class="col-md-5">
            <h3>{{ $display->child_memo }}</h3>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-md-3 mx-auto">
            <input type="submit" class="btn btn-delete btn-lg btn-block" value="削除"> {{-- まだ作ってない --}}
        </div>
        <div class="col-md-3 mx-auto">
            <a class="btn btn-edit btn-lg btn-block" href="{{ action('Users\ChildController@edit', ['id' => $display->id]) }}">編集</a>
        </div>
    </div>
    
    
</div>
@endsection