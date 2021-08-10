{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', '予防接種の記録')

{{-- contentここから --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h3>{{ $vaccine->vaccine_name }}</h3>
            </div>
        </div>
        
        {{-- そのうちm_vaccinesに推奨期間いれたりしたら、こどもの生年月日から推奨期間出すこと考える
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h4>推奨時期</h4>
            </div>
        </div>
        --}}
        
        <div class="row">
            {{-- ここに接種の記録表示になる
            @if()
            @endif
            --}}
        </div>
        
        <div class="form-group row">
            <div class="col-md-3 mx-auto">
                <a class="btn btn-primary btn-lg btn-block" href="/vaccine?id={{ $display->id }}">一覧へ戻る</a>
            </div>
            <div class="col-md-3 mx-auto">
                <a class="btn btn-primary btn-lg btn-block" href="/details/edit?id={{ $display->id }}&vaccine_id={{ $vaccine->id }}">編集</a>
            </div>
            
            
        </div>
        
        
    </div>
@endsection