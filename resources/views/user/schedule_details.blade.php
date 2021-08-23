{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', '予定詳細')

{{-- 後半のクエリ文字列 --}}
@section('get_param','&schedule_id='.$schedule->id)

{{-- contentここから --}}
@section('content')
    <div class="container">
        <h3>予定！</h3>
        
        <h3>{{ $schedule->date }}</h3>
        
        <div class="row">
            <div class="col-md-2">
                予防接種予定 
                @if($schedule->vaccine_flag == 1)
                "あり"
                @else
                "なし"
                @endif
                
            </div>
            <div class="col-md-5">
                ワクチンの名前:
                @if($schedule->vaccine_flag == 1)
                    @foreach($schedule->vaccineSchedule as $vaccineName)  {{-- スケジュールに紐づくt_vaccine_schedulesを回す --}}
                        {{$vaccineName->vaccine->vaccine_name}}  {{-- ↑のt_vaccine_schedulesに紐づくm_vaccinesのvaccine_nameカラムを表示する --}}
                    @endforeach
                @endif
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-2">
                健診予定
                @if($schedule->medical_flag == 1)
                "あり"
                @else
                "なし"
                @endif
            </div>
            <div class="col-md-5">
                検診の名前表示:
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
                {{ $schedule->start_time }}
            </div>
        </div> 
        
        <div class="row">
            <div class="col-md-8">
                {{ $schedule->schedule_memo }}
            </div>
        </div>
        
        
        <div class="form-group row">
            <div class="col-md-3 mx-auto">
                <a class="btn btn-primary btn-lg btn-block" href="/calendar?id={{ $display->id }}">カレンダーへ戻る</a>
            </div>
            <div class="col-md-3 mx-auto">
                <a class="btn btn-primary btn-lg btn-block" href="/calendar/details/edit?id={{ $display->id }}&schedule_id={{ $schedule->id }}">編集</a>
            </div>
            
            
        </div>
        
        
        
        
    </div>


@endsection