{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main2')

{{-- title --}}
@section('title', 'こども情報の追加')

{{-- contentここから --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h3>《{{ count(Auth::user()->children)+1 }}人目のこどもの情報登録》</h3>
            </div>
        </div>
        
        <div class="add-body">
            <form method="POST" action="{{ action('Users\ChildController@addDone') }}">
                @csrf
                
                
                <div class="form-group row">
                    <label class="col-md-3" for="child_name">こどもの名前</label>
                    <div class="col-md-5">
                        <input id="child_name" type="text" class="form-control @error('child_name') is-invalid @enderror" name="child_name" value="{{ old('child_name') }}" required autocomplete="child_name" placeholder="こどもの名前">
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
                            <option value="1">男の子</option>
                            <option value="2">女の子</option>
                            <option value="3">その他</option>
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
                        <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" required>
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
                            <option value="1">A型</option></option>
                            <option value="2">B型</option>
                            <option value="3">O型</option>
                            <option value="4">AB型</option>
                            <option value="5">不明</option>
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
                            <option value="1">+</option>
                            <option value="2">-</option>
                            <option value="3">不明</option>
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
                        <input id="birth_weight" type="text" class="col-md-10 form-control @error('birth_weight') is-invalid @enderror" name="birth_weight" value="{{ old('birth_weight') }}" required autocomplete="birth_weight" placeholder="出生体重"> <span class="col-md-2" style="margin-left: 15px;">g</span>  {{-- 横に来るようにする --}}
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
                        <input id="birth_height" type="text" class="col-md-10 form-control @error('birth_height') is-invalid @enderror" name="birth_height" value="{{ old('birth_height') }}" required autocomplete="birth_height" placeholder="出生身長"> <span class="col-md-2" style="margin-left: 15px;">cm</span>  {{-- 横に来るようにする --}}
                        @error('birth_height')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-3 mx-auto">
                        <input type="button" class="btn btn-cancel btn-lg btn-block" onclick="history.back(-1)" value="戻る">
                    </div>
            
                    <div class="col-md-3 mx-auto">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="　登録　">
                    </div>
                </div>
                
                
            </form>
            
            
        </div>
        
        
    </div>
@endsection