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
                
                
                @for($i = 1; $i <= $vaccine->vaccine_times; $i++)
                
                <div class="form-group row">
                    <div class="col-md-3">
                        <h4>{{$i}}回目</h4>
                    </div>
                </div>
                
                {{-- 中身が無いとき --}}
                @empty($vaccine_histories[$i-1])
                <div class="form-group row">
                    <label class="col-md-3" for="inoculation_date">接種日</label>
                    <div class="col-md-3">
                        <input id="inoculation_date" type="date" class="form-control" name="inoculation_date{{$i}}" value="{{ old('inoculation_date') }}">
                        
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-3" for="hospital">医療機関</label>
                    <div class="col-md-3 form-inline">
                        <input id="hospital" type="text" class="form-control" name="hospital{{$i}}" value="{{ old('hospital') }}" placeholder="医療機関名">
                        
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="vaccine_memo">メモ</label>
                    <div class="col-md-5">
                        <textarea class="form-control" name="vaccine_memo{{$i}}" rows="6" placeholder="メモスペース">{{ old('vaccine_memo') }}</textarea>
                    </div>
                </div>
                
                <input type="hidden" name="insert_flag{{$i}}" value="1">
                
                
                {{-- 中身があるとき --}}
                @else
                
                <div class="form-group row">
                    <label class="col-md-3" for="inoculation_date">接種日</label>
                    <div class="col-md-3">
                        <input id="inoculation_date" type="date" class="form-control" name="inoculation_date{{$i}}" value="{{ $vaccine_histories[$i-1]->inoculation_date}}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-3" for="hospital">医療機関</label>
                    <div class="col-md-3 form-inline">
                        <input id="hospital" type="text" class="form-control" name="hospital{{$i}}" value="{{ $vaccine_histories[$i-1]->hospital }}">
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="vaccine_memo">メモ</label>
                    <div class="col-md-5">
                        <textarea class="form-control" name="vaccine_memo{{$i}}" rows="6" placeholder="メモスペース">{{ $vaccine_histories[$i-1]->vaccine_memo }}</textarea>
                    </div>
                </div>
                
                <input type="hidden" name="update_flag{{$i}}" value="1">
                <input type="hidden" name="update_history{{$i}}" value="{{ $vaccine_histories[$i-1]->id }}">
                
                @endempty
                
                @endfor
                
                
                
                
                
                
                
                
                
                <div class="form-group row form-check">
                    <div class="col-md-4 mx-auto">
                        <input type="checkbox" class="form-check-input" id="done_check" name="done_check" value="1">
                        <label class="form-check-label" for="done_check">この予防接種は完了！</label>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <div class="col-md-3 mx-auto">
                        <a class="btn btn-primary btn-lg btn-block" href="/vaccine/details?id={{ $display->id }}&vaccine_id={{ $vaccine->id }}">キャンセル</a>
                    </div>
                    <div class="col-md-3 mx-auto">
                        <input type="hidden" name="id" value="{{ $display->id }}">
                        <input type="hidden" name="vaccine_id" value="{{ $vaccine->id }}">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="　更新　">
                    </div>
                </div>
                
            </form>
            
        </div>
        
    </div>
@endsection