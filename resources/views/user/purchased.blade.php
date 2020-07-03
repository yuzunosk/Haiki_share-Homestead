@extends('layouts.user.app')


@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div>
    <!-- reactを読み込む -->
    <div id="exhibitionApp">
        <exhibition :Datas="{{ $productData }}" :authData="{{ $userData }}" :pageId={{0}}></exhibition>
    </div>
</div>
@endsection