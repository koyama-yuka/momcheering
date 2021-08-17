{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'スケジュールの編集')

{{-- 後半のクエリ文字列 --}}
@section('get_param','&date='.$date) 

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
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="vaccine_kind">予防接種の種類</label> {{-- ワクチンIDとワクチン名もって来て使いたい --}}
                    <div class="col-md-3">
                    <select id="vaccine_kind" class="form-control" name="vaccine_kind">
                        <option value="">選択してください</option>
                        <option value="1">Hib(ヒブ)ワクチン</option>
                        <option value="2">小児用肺炎球菌ワクチン</option>
                        <option value="3">B型肝炎ワクチン</option>
                    </select>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="medical_flag">健診の有無</label>
                    <div class="col-md-6 radio-inline">
                        <input type="radio" name="medical_flag" id="yes" value="1">
                        <label for="yes">あり</label>
                        
                        <input type="radio" name="medical_flag" id="no" value="0">
                        <label for="no">なし</label>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="medical_kind">健診の種類</label> {{-- 健診のIDと名前もって来て使いたい --}}
                    <div class="col-md-3">
                    <select id="medical_kind" class="form-control" name="medical_kind">
                        <option value="">選択してください</option>
                        <option value="1">生後１ヶ月健診</option>
                        <option value="2">生後３～４ヶ月健診</option>
                        <option value="3">生後６～７ヶ月健診</option>
                    </select>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="start_time">開始時間</label>
                    <div class="col-md-3">
                        <input id="start_time" type="time" class="form-control" name="start_time">
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="schedule_memo">メモ</label>
                    <div class="col-md-5">
                        <textarea class="form-control" name="schedule_memo" rows="6" placeholder="メモスペース">{{ old('schedule_memo') }}</textarea>
                    </div>
                </div>
                
                
                
                
                
                
                
                
                <input type="hidden" name="insert_flag" value="1">
                
                
                {{-- 予定があるとき --}}
                @else
                
                <div class="form-group row">
                    <label class="col-md-3" for="inoculation_date">あああ</label>
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