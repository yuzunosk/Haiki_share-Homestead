@extends('layouts.user.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div>
    <!-- reactを読み込む -->
    <div id="user_mypage">
    </div>

    <div class="warraper">

    </div>
</div>


@endsection