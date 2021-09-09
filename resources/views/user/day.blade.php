{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'この日の予定')

{{-- 後半のクエリ文字列 --}}
@section('get_param','&date='.$date)

{{-- contentここから --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 mx-auto">
                <h3>{{ $date }}</h3>
            </div>
        </div>
        
        {{-- 予定があるとき --}}
        @isset($daySchedules[0])
        @foreach($daySchedules as $daySchedule)
        
        <div class="row">
            <div class="col-md-2">
                予防接種予定： 
                @if($daySchedule->vaccine_flag == 1)
                あり
                @else
                なし
                @endif
                
            </div>
            
            <div class="col-md-10">
                ワクチン：
                @if($daySchedule->vaccine_flag == 1)
                    @foreach(explode(",", $daySchedule->vaccineSchedule->vaccine_id) as $vaccineNameID)
                            {{ $vaccines[$vaccineNameID - 1]->vaccine_name }} /
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
                検診：
                @if($daySchedule->medical_flag == 1)
                    {{$daySchedule->medical->medicalcheck_name}}
                @endif
            </div>
            
            {{-- 詳細ボタン --}}
            <div class="col-md-2 mx-auto">
                <a class="btn btn-primary btn-block" href="/calendar/details?id={{ $display->id }}&schedule_id={{ $daySchedule->id }}">詳細へ</a>
            </div>    
        </div>
        
        <div class="row">
            <div class="col-md-8">
                開始時間：{{ substr($daySchedule->start_time, 0, 5) }}
            </div>
        </div>
        <p></p>
        @endforeach
        
        
        
        {{-- 予定がないとき --}}
        @else
        <h3>予定はありません</h3>
        
        @endisset
        
        <div class="form-group row">
            <div class="col-md-3 mx-auto">
                <a class="btn btn-cancel btn-lg btn-block" href="/calendar?id={{ $display->id }}">カレンダーへ戻る</a>
            </div>
            <div class="col-md-3 mx-auto">
                <a class="btn btn-edit btn-lg btn-block" href="/calendar/day/add?id={{ $display->id }}&date={{ $date }}">新規作成</a>
            </div>
            
            
        </div>
        
        
        
        
    </div>


@endsection