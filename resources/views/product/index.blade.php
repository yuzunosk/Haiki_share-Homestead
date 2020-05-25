@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ __('Product List') }}</h2>

    <div>
        {{ $products->appends(request()->query())->onEachSide(5)->links() }}

        <form action="{{ route('store.product.index') }}" method="GET">
            <div>

                <!-- カテゴリーからデータを取得してループ処理をする -->
                <select name="sort" id="">
                    <option value="">-選択して下さい-</option>
                    <option value="name">-Name-</option>
                    <option value="category">-Category-</option>
                    <option value="price">-Price-</option>
                    <option value="sellby">-Sellby-</option>
                </select>


            </div>

            <div>
                <select name="order" id="">
                    <option value="">-選択して下さい-</option>
                    <option value="asc">-昇順-</option>
                    <option value="desc">-降順-</option>
                </select>
            </div>

            <input type="submit" value="並び替える">
        </form>

        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h4>商品ID:{{ $product->id }}</h4>
                        <h3 class="card-title">商品名:{{ $product->name }}/<span>カテゴリー:{{ $product->category }}</span></h3>
                        <p>{{ $product->price }}円</p>
                        <h5>ストアNo/ {{ $product->store_id }} <span>賞味期限:{{ $product->sellby }}</span></h5>
                        <div>
                            <a href="{{ route('store.product.show', $product->id) }}" class="btn btn-info">{{ __('Go Info')  }}</a>
                            <a href="{{ route('store.product.edit', $product->id) }}" class="btn btn-primary">{{ __('Go Edit')  }}</a>
                            <a href="{{ route('store.product.delete', $product->id) }}" class="btn btn-danger">{{ __('Go Delete')  }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>


</div>
@endsection