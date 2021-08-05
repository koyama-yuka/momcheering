{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'ホーム')

{{-- contentここから --}}
@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h3>{{ $id }}の今日の予定の有無</h3>  {{-- 今日の予定の有無によって個々の表示変える --}}
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <a class="btn btn-primary btn-lg btn-block" href="/home">カレンダー</a>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <a class="btn btn-primary btn-lg btn-block" href="/vaccine">予防接種</a>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <a class="btn btn-primary btn-lg btn-block" href="/child">こどものデータ</a>
            </div>
        </div>
        
        
    </div>


@endsection