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
                <button type="button" class="btn btn-delete btn-lg btn-block" data-toggle="modal" data-target="#modal1" {{ (count($users_children) == 1) ? "disabled" : ""}}>削除</button>
                <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <form role="form" class="form-group" method="POST" action="{{ action('Users\ChildController@childDelete') }}">
                        @csrf
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h3 class="modal-title" id="modalLabelId">確認</h3>
                            </div>
                            <div class="modal-body">
                                <label>本当に削除しますか？</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                                <input type="hidden" name="id" value="{{ $display->id }}">
                                <button type="submit" class="btn btn-danger">削除する</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        <div class="col-md-3 mx-auto">
            <a class="btn btn-edit btn-lg btn-block" href="{{ action('Users\ChildController@edit', ['id' => $display->id]) }}">編集</a>
        </div>
    </div>
    
    
</div>
@endsection