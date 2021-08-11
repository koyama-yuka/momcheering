{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'ホーム')

{{-- contentここから --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <h3>{{$date}}　{{$week}}曜日</h3>
        </div>
    </div>
    <div class="row">
        @if ($scheduleEmptyFlg==1)
            <div class="col-md-10 mx-auto border text-break">
                <p class="user-select-all">予定はありません</p>
            </div>
            <div class="col-md-3 mx-auto">
                        <a href="/child/edit?id={{ $id }}">
                            <button type="button" class="btn btn-primary btn-lg btn-block">編集</button>
                        </a>
                    </div>
        @else
            @foreach ($scheduleDatas as $scheduleData)
                <div class="col-md-10 mx-auto border text-break">
                    <p class="user-select-all">{{$scheduleData}}</p>
                    <p class="user-select-all">{{$scheduleData['id']}}</p>
                    <p class="user-select-all">{{$scheduleData['child_id']}}</p>
                    <p class="user-select-all">{{$scheduleData['date']}}</p>
                    <p class="user-select-all">{{$scheduleData['vaccine_flg']}}</p>
                    <p class="user-select-all">{{$scheduleData['vaccine_id']}}</p>
                    <p class="user-select-all">{{$scheduleData['medical_flg']}}</p>
                    <p class="user-select-all">{{$scheduleData['medical_id']}}</p>
                    <p class="user-select-all">{{$scheduleData['start_time']}}</p>
                    <p class="user-select-all">{{$scheduleData['schedule_memo']}}</p>
                </div>
                    <div class="col-md-3 mx-auto">
                        <a href="">
                            <button type="button" class="btn btn-danger btn-lg btn-block">削除</button>
                        </a>
                    </div>
                    <div class="col-md-3 mx-auto">
                        <a href="/child/edit?id={{ $id }}">
                            <button type="button" class="btn btn-primary btn-lg btn-block">編集</button>
                        </a>
                    </div>
            @endforeach
        @endif
    </div>
</div>        


@endsection