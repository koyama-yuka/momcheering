{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'こども情報編集')

{{-- contentここから --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h3>《{{ $display->child_name }}のデータ編集》</h3>
            </div>
        </div>
        
        <div class="update-body">
            <form method="POST" action="{{ action('Users\ChildController@update') }}">
                @csrf
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="child_name">こどもの名前</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control @error('child_name') is-invalid @enderror" name="child_name" id="child_name" value="{{$display->child_name }}" placeholder="こどもの名前" required>  {{-- id後で全箇所入れとく --}}
                        @error('child_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="gender_id">性別</label>
                    <div class="col-md-3">
                        <select id="gender_id" class="form-control @error('gender_id') is-invalid @enderror" name="gender_id" required>
                            <option value="">性別を選択してください</option>
                            <option value="1" @if($display->gender_id == 1) selected @endif>男の子</option>
                            <option value="2" @if($display->gender_id == 2) selected @endif>女の子</option>
                            <option value="3" @if($display->gender_id == 3) selected @endif>その他</option>
                        </select>
                        @error('gender_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="birthday">生年月日</label>
                    <div class="col-md-3">
                        <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ $display->birthday }}" required>
                        @error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="blood_type_id">血液型</label>
                    <div class="col-md-3">
                        <select id="blood_type_id" class="form-control @error('blood_type_id') is-invalid @enderror" name="blood_type_id" required>
                            <option value="">血液型を選択してください</option>
                                <option value="1" @if($display->blood_type_id == 1) selected @endif>A型</option></option>
                                <option value="2" @if($display->blood_type_id == 2) selected @endif>B型</option>
                                <option value="3" @if($display->blood_type_id == 3) selected @endif>O型</option>
                                <option value="4" @if($display->blood_type_id == 4) selected @endif>AB型</option>
                                <option value="5" @if($display->blood_type_id == 5) selected @endif>不明</option>
                        </select>
                        @error('blood_type_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <select id="blood_rh_id" class="form-control @error('blood_rh_id') is-invalid @enderror" name="blood_rh_id" required>
                            <option value="">Rhを選択してください</option>
                                <option value="1" @if($display->blood_rh_id == 1) selected @endif>+</option>
                                <option value="2" @if($display->blood_rh_id == 2) selected @endif>-</option>
                                <option value="3" @if($display->blood_rh_id == 3) selected @endif>不明</option>
                        </select>
                        @error('blood_rh_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="birth_weight">出生体重</label>
                    <div class="col-md-5" style="display:inline-flex">
                        <input id="birth_weight" type="text" class="col-md-10 form-control @error('birth_weight') is-invalid @enderror" name="birth_weight" value="{{ $display->birth_weight }}" placeholder="出生体重" required> <span class="col-md-2" style="margin-left: 15px;">g</span>  {{-- 横に来るようにする --}}
                        @error('birth_weight')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="birth_height">出生身長</label>
                    <div class="col-md-5" style="display:inline-flex">
                        <input id="birth_height" type="text" class="col-md-10 form-control @error('birth_height') is-invalid @enderror" name="birth_height" value="{{ $display->birth_height }}" placeholder="出生身長" required> <span class="col-md-2" style="margin-left: 15px;">cm</span>  {{-- 横に来るようにする --}}
                        @error('birth_height')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="allergy">アレルギー</label>
                    <div class="col-md-5">
                        <textarea class="form-control" name="allergy" rows="4" placeholder="アレルギーのメモスペース">{{ $display->allergy }}</textarea>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="sick">これまでにかかった主な病気</label>
                    <div class="col-md-5">
                        <textarea class="form-control" name="sick" rows="4" placeholder="これまでにかかった病気のメモスペース">{{ $display->sick }}</textarea>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="child_memo">メモ</label>
                    <div class="col-md-5">
                        <textarea class="form-control" name="child_memo" rows="6" placeholder="メモスペース">{{$display->child_memo}}</textarea>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <div class="col-md-3 mx-auto">
                        <a class="btn btn-cancel btn-lg btn-block" href="/child?id={{ $display->id }}">キャンセル</a>
                    </div>
                    <div class="col-md-3 mx-auto">
                        <input type="hidden" name="id" value="{{ $display->id }}">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="　更新　">
                    </div>
                </div>
                
            </form>
            
        </div>
        
    </div>


@endsection