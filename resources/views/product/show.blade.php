@extends('layouts.store.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div>
    <!-- vueを読み込む -->
    <div id="productApp">
        <productdetail :productdata="{{ $productData }}" :storedata="{{ $storeData }}" :buydata="{{ $buyData }}" :authData="{{ Auth::id() }}"></productdetail>
    </div>
</div>


@endsection