@extends('layouts.user.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div>
    <!-- vueを読み込む -->
    <div id="userApp">
        <userhome-component :buyDatas="{{ $buyData }}" :goodDatas="{{ $goodData }}" :userData="{{ $userData }}"></userhome-component>
    </div>
</div>


@endsection