{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', '予定詳細')

{{-- 後半のクエリ文字列 --}}
@section('get_param','&schedule_id='.$schedule->id)

{{-- contentここから --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 mx-auto">
                <h3>{{ $schedule->date }}</h3>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-2">
                予防接種予定： 
                @if($schedule->vaccine_flag == 1)
                あり
                @else
                なし
                @endif
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                ワクチンの名前：
                @if($schedule->vaccine_flag == 1)
                    @if($vaccine_kind[0] == "")
                        選択なし
                    @else
                        @foreach($vaccine_kind as $vaccine_kindID)
                            {{ $vaccines[$vaccine_kindID - 1]->vaccine_name }} /
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-2">
                健診予定： 
                @if($schedule->medical_flag == 1)
                あり
                @else
                なし
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                検診の名前：
                @if($schedule->medical_flag == 1)
                    @if($schedule->medical == "")
                        選択なし
                    @else
                        {{$schedule->medical->medicalcheck_name}}
                    @endif
                @endif
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-8">
                開始時間：{{ substr($schedule->start_time, 0, 5) }}
            </div>
        </div> 
        
        <div class="row">
            <div class="col-md-8">
                メモ：{{ $schedule->schedule_memo }}
            </div>
        </div>
        
        
        <div class="form-group row">
            <div class="col-md-3 mx-auto">
                <button type="button" class="btn btn-delete btn-lg btn-block" data-toggle="modal" data-target="#modal1">削除</button>
                <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <form role="form" class="form-group" method="POST" action="{{ action('Users\ScheduleController@detailDelete') }}">
                        @csrf
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h3 class="modal-title" id="modalLabelId">確認</h3>
                            </div>
                            <div class="modal-body">
                                <label>本当に削除しますか？</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                                <input type="hidden" name="id" value="{{ $display->id }}">
                                <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                                <button type="submit" class="btn btn-danger">削除する</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3 mx-auto">
                <a class="btn btn-edit btn-lg btn-block" href="/calendar/details/edit?id={{ $display->id }}&schedule_id={{ $schedule->id }}">編集</a>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-3 mx-auto">
                <a class="btn btn-cancel btn-lg btn-block" href="/calendar?id={{ $display->id }}">カレンダーに戻る</a>
            </div>
        </div>
        
        
        
    </div>


@endsection