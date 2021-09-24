{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', '予防接種の記録')

{{-- 後半のクエリ文字列 --}}
@section('get_param','&vaccine_id='.$vaccine->id) 

{{-- contentここから --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto text-center h3">
                {{ $vaccine->vaccine_name }}
            </div>
        </div>
        
        {{-- そのうちm_vaccinesに推奨期間いれたりしたら、こどもの生年月日から推奨期間出すこと考える
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h4>推奨時期</h4>
            </div>
        </div>
        --}}
        <div class="col-7 mx-auto">
            @for($i = 1; $i <= $vaccine->vaccine_times; $i++)
                <div class="row">
                    <div class="col-md-6 h3">【{{ $i }}回目】</div>
                </div>
                    
                {{-- 記録がないとき --}}
                @empty($vaccine_histories[$i-1])
                    <div class="row">
                        <div class="col-md-6 vaccine_record">
                            接種の記録がありません
                        </div>
                    </div>
                    <p></p>
                    
                {{-- 記録があるとき --}}
                @else
                    <div class="row">
                        <div class="col-12 vaccine_record">
                            接種日：{{ $vaccine_histories[$i-1]->inoculation_date }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 vaccine_record">
                            医療機関：{{ $vaccine_histories[$i-1]->hospital }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 vaccine_record">
                            (メモ) {{ $vaccine_histories[$i-1]->vaccine_memo }}
                        </div>
                    </div>
                    <p></p>
            @endempty
        @endfor
        </div>
        
        <div class="form-group row">
            <div class="col-md-3 mx-auto">
                <a class="btn btn-cancel btn-lg btn-block" href="/vaccine?id={{ $display->id }}">一覧へ戻る</a>
            </div>
            <div class="col-md-3 mx-auto">
                <a class="btn btn-edit btn-lg btn-block" href="/vaccine/details/edit?id={{ $display->id }}&vaccine_id={{ $vaccine->id }}">編集</a>
            </div>
            
            
        </div>
        
        
    </div>
@endsection