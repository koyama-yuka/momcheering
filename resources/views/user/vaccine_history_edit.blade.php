{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', '摂取状況の編集')

{{-- contentここから --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h3>ワクチン名を表示</h3>  {{-- ワクチン名の表示を持ってくる --}}
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-3">
                <h4>何回目</h4>  {{-- 繰り返しで表示の方法はコントローラー？ --}}
            </div>
        </div>
    
        <div class="form-group row">
            <label class="col-md-3" for="inoculation_date">接種日</label>
            <div class="col-md-2">
                <select class="form-control" name="year">
                    <option value="">年</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-control" name="month">
                    <option value="">月</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-control" name="day">
                    <option value="">日</option>
                </select>
            </div>
        </div>
    
        <div class="form-group row">
            <label class="col-md-3" for="hospital">医療機関</label>
            <div class="col-md-3 form-inline">
                <input type="text" class="form-control" name="birth_weight" id="hospital">
            </div>
        </div>
        
        
        <div class="form-group row">
            <label class="col-md-3" for="vaccine_memo">メモ</label>
            <div class="col-md-5">
                <textarea class="form-control" name="vaccine_memo" rows="6" id="vaccine_memo"></textarea>
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
                {{--
                <input type="" name="" value="">
                {{ csrf_field() }}
                --}}
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="キャンセル">
            </div>
            <div class="col-md-3 mx-auto">
                {{--
                <input type="" name="" value="">
                {{ csrf_field() }}
                --}}
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="　更新　">
            </div>
            
            
        </div>
        
        
    </div>
@endsection