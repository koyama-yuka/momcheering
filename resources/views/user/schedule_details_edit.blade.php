{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'スケジュールの編集')

{{-- 後半のクエリ文字列 --}}
@section('get_param','&schedule_id='.$schedule->id) 

{{-- contentここから --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h3>予定編集</h3>
            </div>
        </div>
        
        <div class="add-body">
            <form method="POST" action="{{ action('Users\ScheduleController@update') }}">
                @csrf
                
                <div class="form-group row">
                    <label class="col-md-3" for="vaccine_flag">予防接種の有無</label>
                    <div class="col-md-6 radio-inline">
                        <input type="radio" name="vaccine_flag" id="yes" value="1" {{ ($schedule->vaccine_flag == 1) ? "checked" : "" }}>
                        <label for="yes">あり</label>
                        
                        <input type="radio" name="vaccine_flag" id="no" value="0" {{ ($schedule->vaccine_flag == 0) ? "checked" : "" }}>
                        <label for="no">なし</label>
                    </div>
                </div>
                
                
                {{-- 今$vac_arr[0]になっているところを複数対応にしたい、おそらくforeachの外側にも$vac_arrのforeachかな　あとは保存の仕方…--}}
                <div class="form-group row">
                    <label class="col-md-3" for="vaccine_id">予防接種の種類</label>
                    <div class="col-md-3">
                    <select id="vaccine_id" class="form-control" name="vaccine_id">
                        <option value="">選択してください</option>
                        
                        @foreach($vaccines as $vaccineName)
                            <option value="{{ $vaccineName->id }}" @if($vac_arr[0]->vaccine_id == $vaccineName->id) selected @endif>{{ $vaccineName->vaccine_name }}</option>
                        @endforeach
                        
                    </select>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="vaccine_id">予防接種の種類(仮)</label>
                    <div class="col-md-8">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="vaccine_id" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Hib(ヒブ)ワクチン</label>
                        </div>
                        
                        {{-- TODO:nameは全部いっしょでおk、↑みたいにforeachで回す --}}
                        
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">小児用肺炎球菌ワクチン</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">HPV(ヒトパピローマウイルス)ワクチン</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">HPV(ヒトパピローマウイルス)ワクチン</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">HPV(ヒトパピローマウイルス)ワクチン</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">HPV(ヒトパピローマウイルス)ワクチン</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">HPV(ヒトパピローマウイルス)ワクチン</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">HPV(ヒトパピローマウイルス)ワクチン</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">HPV(ヒトパピローマウイルス)ワクチン</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">HPV(ヒトパピローマウイルス)ワクチン</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled>
                            <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
                        </div>
                    </div>
                </div>
                
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="medical_flag">健診の有無</label>
                    <div class="col-md-6 radio-inline">
                        <input type="radio" name="medical_flag" id="yes" value="1" {{ ($schedule->medical_flag == 1) ? "checked" : "" }}>
                        <label for="yes">あり</label>
                        
                        <input type="radio" name="medical_flag" id="no" value="0" {{ ($schedule->medical_flag == 1) ? "checked" : "" }}>
                        <label for="no">なし</label>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="medical_kind">健診の種類</label>
                    <div class="col-md-3">
                    <select id="medical_kind" class="form-control" name="medical_kind">
                        <option value="">選択してください</option>
                        @foreach($medicals as $medicalName)
                            <option value="{{ $medicalName->id }}" @if($med->id == $medicalName->id) selected @endif>{{ $medicalName->medicalcheck_name }}</option>
                        @endforeach
                        
                        
                        <option value="1">生後１ヶ月健診</option>
                        <option value="2">生後３～４ヶ月健診</option>
                        <option value="3">生後６～７ヶ月健診</option>
                    </select>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="start_time">開始時間</label>
                    <div class="col-md-3">
                        <input id="start_time" type="time" class="form-control" name="start_time" value="{{ $schedule->start_time }}">
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="schedule_memo">メモ</label>
                    <div class="col-md-5">
                        <textarea class="form-control" name="schedule_memo" rows="6" placeholder="メモスペース">{{ $schedule->schedule_memo }}</textarea>
                    </div>
                </div>
                
                
            
                
                
                
                
                
                
                
                <div class="form-group row">
                    <div class="col-md-3 mx-auto">
                        <a class="btn btn-primary btn-lg btn-block" href="/calendar/details?id={{ $display->id }}&date={{ $schedule['date'] }}">キャンセル</a>
                    </div>
                    <div class="col-md-3 mx-auto">
                        <input type="hidden" name="id" value="{{ $display->id }}">
                        <input type="hidden" name="date" value="{{ $schedule['date'] }}">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="　更新　">
                    </div>
                </div>
                
            </form>
            
        </div>
        
    </div>
@endsection



