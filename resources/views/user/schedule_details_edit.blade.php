{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'スケジュールの編集')

{{-- contentここから --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h3>{{ $date }}の予定　編集</h3>
            </div>
        </div>
        
        <div class="add-body">
            <form method="POST" action="{{ action('Users\ScheduleController@update') }}">
                @csrf
                
                
                {{-- 予定が無いとき --}}
                @empty($schedule[0])
                <div class="form-group row">
                    <label class="col-md-3" for="vaccine_flag">予防接種の有無</label>
                    <div class="col-md-6 radio-inline">
                        <input type="radio" name="vaccine_flag" id="yes" value="1">
                        <label for="yes">あり</label>
                
                        <input type="radio" name="vaccine_flag" id="no" value="0">
                        <label for="no">なし</label>
                    </div>
                </div>
                
                
                
                <input type="hidden" name="insert_flag" value="1">
                
                
                {{-- 予定があるとき --}}
                @else
                
                <div class="form-group row">
                    <label class="col-md-3" for="inoculation_date">接種日</label>
                    <div class="col-md-3">
                        <input id="inoculation_date" type="date" class="form-control" name="inoculation_date{{$i}}" value="{{ $vaccine_histories[$i-1]->inoculation_date}}">
                    </div>
                </div>
                
                
                
                <input type="hidden" name="update_flag" value="1">
                <input type="hidden" name="update_schedule" value="{{ $schedule[0]->id }}">
                
                @endempty
                
                
                
                
                
                <div class="form-group row">
                    <div class="col-md-3 mx-auto">
                        <a class="btn btn-primary btn-lg btn-block" href="/calendar/details?id={{ $display->id }}&date={{ $date }}">キャンセル</a>
                    </div>
                    <div class="col-md-3 mx-auto">
                        <input type="hidden" name="id" value="{{ $display->id }}">
                        <input type="hidden" name="date" value="{{ $date }}">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="　更新　">
                    </div>
                </div>
                
            </form>
            
        </div>
        
    </div>
@endsection