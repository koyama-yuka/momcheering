{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'この日の予定')

{{-- 後半のクエリ文字列 --}}
@section('get_param','&date='.$date)

{{-- contentここから --}}
@section('content')
    <div class="container">
        <h3>予定！</h3>
        
        {{-- 予定があるとき --}}
        @isset($details[0])
        @foreach($details as $detail)
        <h3>{{ $detail->date }}</h3>
        
        <div class="row">
            <div class="col-md-2">
                予防接種予定 
                @if($detail->vaccine_flag == 1)
                "あり"
                @else
                "なし"
                @endif
                
            </div>
            <div class="col-md-5">
                ワクチンの名前
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-2">
                健診予定
            </div>
            <div class="col-md-5">
                検診の名前表示
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-2">
                開始時間
            </div>
            <div class="col-md-3">
                {{ $detail->start_time }}
            </div>
        </div> 
        
        <div class="row">
            <div class="col-md-8">
                {{ $detail->schedule_memo }}
            </div>
        </div>
        @endforeach
        
        
        
        {{-- 予定がないとき --}}
        @else
        <h3>予定はありません</h3>
        
        @endisset
        
        <div class="form-group row">
            <div class="col-md-3 mx-auto">
                <a class="btn btn-primary btn-lg btn-block" href="/calendar?id={{ $display->id }}">カレンダーへ戻る</a>
            </div>
            <div class="col-md-3 mx-auto">
                <a class="btn btn-primary btn-lg btn-block" href="/calendar/details/edit?id={{ $display->id }}&date={{ $date }}">編集</a>
            </div>
            
            
        </div>
        
        
        
        
    </div>


@endsection