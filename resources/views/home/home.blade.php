{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'ホーム')

{{-- contentここから --}}
@section('content')
    <div class="container">
        {{-- こどもの現在選択中であることとボタンは後で考える、というかlayoutsに入れる --}}
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h3>今日の予定の有無</h3>  {{-- 今日の予定の有無によって個々の表示変える --}}
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="カレンダー">
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="予防接種">
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="こどものデータ">
            </div>
        </div>
        
    </div>


@endsection