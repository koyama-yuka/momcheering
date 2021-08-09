{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', '予防接種詳細') {{-- ワクチン名＋履歴　で名前出せればさらにgoodで --}}

{{-- contentここから --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h3>{{ $vaccine->vaccine_name }}</h3>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h4>推奨時期</h4> {{-- 生年月日から時期出せたらいいな・・・ --}}
            </div>
        </div>
        
        <div class="row">
            {{-- 履歴があれば表示するので、コントローラーでその時の指示を出したい --}}
        </div>
        
        <div class="form-group row">
            <div class="col-md-3 mx-auto">
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="一覧へ戻る">
            </div>
            <div class="col-md-3 mx-auto">
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="　編集　">
            </div>
            
            
        </div>
        
        
    </div>
@endsection