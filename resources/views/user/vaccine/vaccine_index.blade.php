{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', '予防接種一覧')

{{-- contentここから --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h3>《予防接種一覧》</h3>
            </div>
        </div>
        
        <div class="form-group row">
            {{-- 各ワクチンのボタン表示 --}}
        </div>
        
        <div class="form-group row">
            <div class="col-md-4 mx-auto">
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="データPDF出力ボタン">
            </div>
        </div>
    </div>



@endsection