{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'ホーム')

{{-- contentここから --}}
@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
            @if(empty($todaySchedule[0]))
                <h3>{{ $display->child_name }}の今日の予定はありません</h3>
            @else
                <h3>{{ $display->child_name }}の今日の予定は<a class="todayschedule" href="/calendar/day?id={{ $display->id }}&date={{ $today }}">{{ count($todaySchedule) }}件</a>あります</h3>
            @endif
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <a class="btn btn-main-content btn-lg btn-block" href="/calendar?id={{ $display->id }}">カレンダー</a>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <a class="btn btn-main-content btn-lg btn-block" href="/vaccine?id={{ $display->id }}">予防接種</a>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <a class="btn btn-main-content btn-lg btn-block" href="/child?id={{ $display->id }}">こどものデータ</a>
            </div>
        </div>
        
        
    </div>


@endsection