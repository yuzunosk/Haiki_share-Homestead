@extends('layouts.user.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div>
    <div id="example">
    </div>

    <div class="warraper">

    </div>
</div>


@endsection