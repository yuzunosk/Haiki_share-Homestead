@extends('layouts.store.app')


@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div>
    <!-- reactを読み込む -->
    <div id="exhibitionApp">
        <exhibition :productDatas="{{ $productData }}" :storeData="{{ $storeData }}"></exhibition>
    </div>
</div>
@endsection