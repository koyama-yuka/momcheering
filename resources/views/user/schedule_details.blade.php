{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'この日の予定')

{{-- contentここから --}}
@section('content')
    <div class="container">
        <h3>予定！</h3>
        
        {{-- 予定があるとき --}}
        @isset($details[0])
        <h3>{{ $details[0] }}</h3>
        
        {{-- 予定がないとき --}}
        @else
        <h3>予定はありません</h3>
        
        @endisset
        
    </div>


@endsection