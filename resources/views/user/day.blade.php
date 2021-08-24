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
        @isset($daySchedules[0])
        @foreach($daySchedules as $daySchedule)
        <h3>{{ $daySchedule->date }}</h3>
        
        <div class="row">
            <div class="col-md-2">
                予防接種予定： 
                @if($daySchedule->vaccine_flag == 1)
                あり
                @else
                なし
                @endif
                
            </div>
            <div class="col-md-5">
                ワクチンの名前：
                @if($daySchedule->vaccine_flag == 1)
                    @foreach($daySchedule->vaccineSchedule as $vaccineName)  {{-- スケジュールに紐づくt_vaccine_schedulesを回す --}}
                        {{$vaccineName->vaccine->vaccine_name}}  {{-- ↑のt_vaccine_schedulesに紐づくm_vaccinesのvaccine_nameカラムを表示する --}}
                    @endforeach
                @endif
                
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-2">
                健診予定： 
                @if($daySchedule->medical_flag == 1)
                あり
                @else
                なし
                @endif
                
            </div>
            <div class="col-md-5">
                検診の名前表示：
                @if($daySchedule->medical_flag == 1)
                    {{$daySchedule->medical->medicalcheck_name}}
                @endif
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-2">
                開始時間
            </div>
            <div class="col-md-3">
                {{ $daySchedule->start_time }}
            </div>
        </div> 
        
        <div class="row">
            <div class="col-md-8">
                {{ $daySchedule->schedule_memo }}
            </div>
        </div>
        
        
        {{-- 編集ボタン --}}
        <div class="form-group row">
            <div class="col-md-3 mx-auto">
                <a class="btn btn-primary btn-lg btn-block" href="/calendar/details?id={{ $display->id }}&={{ $daySchedule->id }}">詳細へ</a>
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
                <a class="btn btn-primary btn-lg btn-block" href="/calendar/day/add?id={{ $display->id }}&date={{ $date }}">新規作成</a>
            </div>
            
            
        </div>
        
        
        
        
    </div>


@endsection