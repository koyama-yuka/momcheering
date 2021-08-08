{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', '予防接種一覧')

{{-- contentここから --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h3>《{{ $display->child_name }}の予防接種一覧》</h3>
            </div>
        </div>
        
        <div class="form-group row">
            
            @foreach($vaccines as $vaccine)
            
            <div class="col-md-2">
                    <a class="btn btn-primary btn-lg btn-block" href="/vaccine?id={{ $display->id }}&&vaccine_id={{ $vaccine->id }}" role="button">{{ $vaccine->vaccine_name }}</a>
            
            @endforeach
            
        </div>
        
        <div class="form-group row">
            <div class="col-md-4 mx-auto">
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="データPDF出力ボタン"> {{-- PDF化については最後の最後かな… --}}
            </div>
        </div>
    </div>



@endsection