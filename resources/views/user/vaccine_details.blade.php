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
            <div class="col-md-4 mx-auto">
                <h3>{{ $vaccine->vaccine_name }}</h3>
            </div>
        </div>
        
        {{-- そのうちm_vaccinesに推奨期間いれたりしたら、こどもの生年月日から推奨期間出すこと考える
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h4>推奨時期</h4>
            </div>
        </div>
        --}}
        
        
            
            @for($i = 1; $i <= $vaccine->vaccine_times; $i++)
                <div class="row">
                    <div class="col-md-1"><h3>{{ $i }}回目</h3></div>
                    
                    {{-- 記録がないとき --}}
                    @empty($vaccine_histories[$i-1])
                    
                        <div class="col-md-2">
                            <h3>接種日</h3>
                        </div>
                        <div class="col-md-3">
                            <h3>接種日がありません</h3>
                        </div>
                        
                        <div class="col-md-2">
                            <h3>医療機関</h3>
                        </div>
                        <div class="col-md-4">
                            <h3>接種記録がありません</h3>
                        </div>
                    
                    
                    {{-- 記録がないとき --}}
                    @else
                    
                        <div class="col-md-2">
                            <h3>接種日</h3>
                        </div>
                        <div class="col-md-3">
                            <h3>{{ $vaccine_histories[$i-1]->inoculation_date }}</h3>
                        </div>
                        
                        <div class="col-md-2">
                            <h3>医療機関</h3>
                        </div>
                        <div class="col-md-4">
                            <h3>{{ $vaccine_histories[$i-1]->hospital }}</h3>
                        </div>
                    
                    
                    @endempty
                    
                    
                    
                </div>
            @endfor
        
        
        <div class="form-group row">
            <div class="col-md-3 mx-auto">
                <a class="btn btn-primary btn-lg btn-block" href="/vaccine?id={{ $display->id }}">一覧へ戻る</a>
            </div>
            <div class="col-md-3 mx-auto">
                <a class="btn btn-primary btn-lg btn-block" href="/vaccine/details/edit?id={{ $display->id }}&vaccine_id={{ $vaccine->id }}">編集</a>
            </div>
            
            
        </div>
        
        
    </div>
@endsection