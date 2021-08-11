{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', '接種状況の編集')

{{-- contentここから --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h3>{{ $vaccine->vaccine_name }}の接種記録編集</h3>
            </div>
        </div>
        
        <div class="add-body">
            <form method="POST" action="{{ action('Users\VaccineController@update') }}">
                @csrf
                
                <div class="form-group row">
                    <div class="col-md-3">
                        <h4>何回目</h4>  {{-- 繰り返しで表示の方法はコントローラー？ --}}
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-3" for="inoculation_date">接種日</label>
                    <div class="col-md-3">
                        <input id="inoculation_date" type="date" class="form-control @error('inoculation_date') is-invalid @enderror" name="inoculation_date" value="{{ $vaccine_histories->inoculation_date }}" required>
                        @error('inoculation_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-3" for="hospital">医療機関</label>
                    <div class="col-md-3 form-inline">
                        <input id="hospital" type="text" class="form-control @error('hospital') is-invalid @enderror" name="hospital" value="{{ $vaccine_histories->hospital }}" required>
                        @error('hospital')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="vaccine_memo">メモ</label>
                    <div class="col-md-5">
                        <textarea class="form-control" name="vaccine_memo" rows="6" placeholder="メモスペース">{{ $child_form->allergy }}</textarea>
                    </div>
                </div>
                
                
                <div class="form-group row form-check">
                    <div class="col-md-4 mx-auto">
                        <input type="checkbox" class="form-check-input" id="done_check">
                        <label class="form-check-label" for="done_check">この予防接種は完了！</label>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <div class="col-md-3 mx-auto">
                        <a class="btn btn-primary btn-lg btn-block" href="/details?id={{ $child_form->id }}&vaccine_id={{ $vaccine->id }}">キャンセル</a>
                    </div>
                    <div class="col-md-3 mx-auto">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="　更新　">
                    </div>
                </div>
                
            </form>
            
        </div>
        
    </div>
@endsection