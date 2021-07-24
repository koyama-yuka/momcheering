{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'こども情報の追加')

{{-- contentここから --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h3>《10人目のこどもの情報登録》</h3>  {{-- 後で何人目のこどもなのか出るようにする --}}
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-md-3" for="child_name">こどもの名前</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="child_name" id="child_name">  {{-- id後で全箇所入れとく --}}
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-md-3" for="gender">性別</label>
            <div class="col-md-3">
                <select class="form-control" name="gender">
                    <option value="">選択してください</option>
                    <option value="1">男の子</option>
                    <option value="2">女の子</option>
                    <option value="3">その他</option>
                </select>
            </div>
        </div>
    
        <div class="form-group row">
            <label class="col-md-3" for="birthday">生年月日</label>
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
            <label class="col-md-3" for="blood_type">血液型</label>
            <div class="col-md-3">
                <select class="form-control" name="blood_type">
                    <option value="">選択してください</option>  {{-- 後で入れる方法考える --}}
                    <option value="1">A型</option>
                    <option value="2">B型</option>
                    <option value="3">O型</option>
                    <option value="4">AB型</option>
                    <option value="5">不明</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-control" name="blood_rh">
                    <option value="">選択してください</option>  {{-- 後で入れる方法考える --}}
                    <option value="1">+</option>
                    <option value="2">-</option>
                    <option value="3">不明</option>
                </select>
            </div>
        </div>
    
        <div class="form-group row">
            <label class="col-md-3" for="birth_weight">出生体重</label>
            <div class="col-md-3 form-inline">
                <input type="text" class="form-control" name="birth_weight" id="birth_weight"> <span style="margin-left:10px;">g</span> {{-- spanのところは後でscssの方へ書く --}}
            </div>
        </div>
    
        <div class="form-group row">
            <label class="col-md-3" for="birth_height">出生身長</label>
            <div class="col-md-3 form-inline">
                <input type="text" class="form-control" name="birth_height" id="birth_height"> <span style="margin-left:10px;">cm</span> {{-- spanの装飾はscssへ --}}
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
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="　登録　">
            </div>
            
            
        </div>
        
        
    </div>
@endsection