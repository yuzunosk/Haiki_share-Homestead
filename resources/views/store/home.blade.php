@extends('layouts.store.app')


@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div>
    <!-- reactを読み込む -->
    <div id="storeApp">
        <storehome-component :productDatas="{{ $productData }}" :storeData="{{ $storeData }}" :buyDatas="{{ $buyData }}" ></storehome-component>
    </div>
</div>
@endsection