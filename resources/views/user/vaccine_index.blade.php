{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', '予防接種一覧')

{{-- contentここから --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto text-center">
                <h3>《{{ $display->child_name }}の予防接種一覧》</h3>
            </div>
        </div>
        
        
        <div class="row">    
        @foreach($vaccines as $vaccine)
            @if(in_array($vaccine->id, $check_vaccineNumber))
                <div class="col-lg-4 mb-3">
                    <a class="btn btn-vaccine-done btn-lg btn-block py-3 d-flex align-items-center justify-content-center" href="/vaccine/details?id={{ $display->id }}&vaccine_id={{ $vaccine->id }}" role="button">{{ $vaccine->vaccine_name }}★完了</a>
                </div>
            @else
                <div class="col-lg-4 mb-3">
                    <a class="btn btn-vaccine btn-lg btn-block py-3 d-flex align-items-center justify-content-center" href="/vaccine/details?id={{ $display->id }}&vaccine_id={{ $vaccine->id }}" role="button"><div>{{ $vaccine->vaccine_name }}</div></a>
                </div>
            @endif
            
        @endforeach
        </div>
        
        {{-- PDF化は今後の課題で予定
        <div class="form-group row">
            <div class="col-md-4 mx-auto">
                <input type="submit" class="btn btn-pdf btn-lg btn-block" value="データPDF出力ボタン">
            </div>
        </div>
        --}}
    </div>



@endsection