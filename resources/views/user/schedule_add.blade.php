{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'スケジュールの新規作成')

{{-- 後半のクエリ文字列 --}}
@section('get_param','&date='.$date) 

{{-- contentここから --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h3>新規作成</h3>
            </div>
        </div>
        
        <div class="add-body">
            <form method="POST" action="{{ action('Users\ScheduleController@add') }}">
                @csrf
                
                 <div class="form-group row">
                    <label class="col-md-3" for="date">予定日</label>
                    <div class="col-md-3">
                        <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $date }}" required>
                        @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="vaccine_flag">予防接種の有無</label>
                    <div class="col-md-6 radio-inline">
                        <input type="radio" name="vaccine_flag" id="vaccine_flag_on" value="1">
                        <label for="yes">あり</label>
                        
                        <input type="radio" name="vaccine_flag" id="vaccine_flag_off" value="0" >
                        <label for="no">なし</label>
                    </div>
                </div>
                
                {{-- TODO:保存の仕方 --}}
                <div class="form-group row">
                    <label class="col-md-3" for="vaccine_id">予防接種の種類</label>
                    <div class="col-md-8">
                        @foreach($vaccines as $vaccineName)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input vaccine_kind" type="checkbox" id="checkbox{{ $vaccineName->id }}" name="vaccine_id[]" value="{{ $vaccineName->id }}">
                                <label class="form-check-label" for="checkbox{{ $vaccineName->id }}">{{ $vaccineName->vaccine_name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="medical_flag">健診の有無</label>
                    <div class="col-md-6 radio-inline">
                        <input type="radio" name="medical_flag" id="medical_flag_on" value="1">
                        <label for="yes">あり</label>
                        
                        <input type="radio" name="medical_flag" id="medical_flag_off" value="0">
                        <label for="no">なし</label>
                    </div>
                </div>
                
                
                {{-- TODO:ラジオボタンで --}}
                <div class="form-group row">
                    <label class="col-md-3" for="medical_kind">健診の種類</label>
                    <div class="col-md-8 radio-inline">
                        @foreach($medicals as $medicalName)
                            <input type="radio" name="medical_kind" id="medical_kind{{ $medicalName->id }}" value="{{ $medicalName->id }}">
                            <label for="medical_kind{{ $medicalName->id }}">{{ $medicalName->medicalcheck_name }}</label>
                        @endforeach
                        
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="start_time">開始時間</label>
                    <div class="col-md-3">
                        <input id="start_time" type="time" class="form-control" name="start_time" value="{{ old('start_time') }}">
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="schedule_memo">メモ</label>
                    <div class="col-md-5">
                        <textarea class="form-control" name="schedule_memo" rows="6" placeholder="メモスペース">{{ old('schedule_memo') }}</textarea>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <div class="col-md-3 mx-auto">
                        <a class="btn btn-primary btn-lg btn-block" href="/calendar/day?id={{ $display->id }}&date={{ $date }}">キャンセル</a>
                    </div>
                    <div class="col-md-3 mx-auto">
                        <input type="hidden" name="id" value="{{ $display->id }}">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="　登録　">
                    </div>
                </div>
                
            </form>
            
        </div>
        
    </div>
    
@endsection
