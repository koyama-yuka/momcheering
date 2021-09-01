{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'ホーム')

{{-- contentここから --}}
@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h3>{{ $display->child_name }}の今日の予定</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto">
                @if(empty($todaySchedule))
                    なし
                @else
                    あり
                @endif
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <a class="btn btn-primary btn-lg btn-block" href="/calendar?id={{ $display->id }}">カレンダー</a>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <a class="btn btn-primary btn-lg btn-block" href="/vaccine?id={{ $display->id }}">予防接種</a>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <a class="btn btn-primary btn-lg btn-block" href="/child?id={{ $display->id }}">こどものデータ</a>
            </div>
        </div>
        
        
    </div>


@endsection