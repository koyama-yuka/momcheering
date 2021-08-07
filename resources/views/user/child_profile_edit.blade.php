{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'こども情報編集')

{{-- contentここから --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h3> {{$childData->child_name}}</h3>  {{-- 後でこどもの名前が出るようにする --}}
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-md-3" for="child_name">こどもの名前</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="child_name" id="child_name" value="{{$childData->child_name}}"> 
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-md-3" for="gender">性別</label>
            <div class="col-md-3">
                {{ Form::select('gender', ['選択してください', '男の子','女の子','その他'], $childData->gender_id, ['class'=>'form-control']) }}
            </div>
        </div>
    
        <div class="form-group row">
            <label class="col-md-3" for="birthday">生年月日</label>
            <div class="col-md-2">
                <?php 
                    $start_year = today()->year -20;
                    $end_year = today()->year + 2;
                ?>
                {{ Form::selectRange('year', $start_year, $end_year, $birthdayYear,['class'=>'form-control']) }}
            </div>
            <div class="col-md-2">
                {{ Form::selectRange('month', 01, 12, $birthdayMonth,['class'=>'form-control']) }}
            </div>
            <div class="col-md-2">
                {{ Form::selectRange('day', 01, 31, $birthdayDay,['class'=>'form-control']) }}
            </div>
        </div>
    
        <div class="form-group row">
            <label class="col-md-3" for="blood_type">血液型</label>
            <div class="col-md-3">
                {{ Form::select('blood_type', ['選択してください', 'A型','B型','O型', 'AB型', '不明'], $childData->blood_type_id, ['class'=>'form-control']) }}
            </div>
            <div class="col-md-3">
                {{ Form::select('blood_rh', ['選択してください', '+','-','不明'], $childData->blood_rh_id, ['class'=>'form-control']) }}
            </div>
        </div>
    
        <div class="form-group row">
            <label class="col-md-3" for="birth_weight">出生体重</label>
            <div class="col-md-3 form-inline">
                <input type="text" class="form-control" name="birth_weight" id="birth_weight" value="{{$childData->birth_weight}}"> <span style="margin-left:10px;">g</span>
            </div>
        </div>
    
        <div class="form-group row">
            <label class="col-md-3" for="birth_height">出生身長</label>
            <div class="col-md-3 form-inline">
                <input type="text" class="form-control" name="birth_height" id="birth_height" value="{{$childData->birth_height}}"> <span style="margin-left:10px;">cm</span> {{-- spanの装飾はscssへ --}}
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-md-3" for="allergy">アレルギー</label>
            <div class="col-md-5">
                <textarea class="form-control" name="allergy" rows="4" value="{{$childData->allergy}}"></textarea>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-md-3" for="sick">これまでにかかった主な病気</label>
            <div class="col-md-5">
                <textarea class="form-control" name="sick" rows="4" value="{{$childData->sick}}"></textarea>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-md-3" for="child_memo">メモ</label>
            <div class="col-md-5">
                <textarea class="form-control" name="child_memo" rows="6" value="{{$childData->child_memo}}"></textarea>
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