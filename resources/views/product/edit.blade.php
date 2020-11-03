@extends('layouts.store.app')

@section('content')


<form method="POST" action="{{ route('store.product.update', $productData->id) }}" enctype="multipart/form-data">
    @csrf

    <div class="l_input__container u_font__default u_text--space ">

        <div class="l_input__product--title  u_display--center u_fs__text--title">{{ __('Product Edit') }}</div>

        <!-- 名前     -->
        <div class="l_input__product--name  u_display--start--column">
            <label class="u_ds--block" for="name" class="">{{ __('Product Name') }}</label>
            @error('email')
            <span class="c_input--error-msg" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="">
                <input class="c_input--default" id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name', $productData->name) }}" required autocomplete="name" autofocus>
            </div>
        </div>
        <!-- 名前 END  -->


        <!-- カテゴリー -->
        <div class="l_input__product--category u_display--start--column">
            <label for="category" class="">{{ __('category') }}</label>
            @error('category')
            <span class="c_input--error-msg" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="">
                <select class="c_input--default" name="category" id="category">
                    <option value="">-- 選択してください --</option>
                    <!-- ループ処理 -->
                    @foreach($categorys as $category)
                    <option value="{{ $category->name }}" @if(old('category', $productData->category )==$category->name) selected @endif">{{ $category->name }}</option>
                    @endforeach
                </select>


            </div>
        </div>
        <!-- カテゴリー END -->

        <!-- 通常 価格 -->
        <div class="l_input__product--r_price u_display--start--column">
            <label for="regular_price" class="">{{ __('regular price') }}</label>
            @error('regular_price')
            <span class="c_input--error-msg" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="u_text--align-r">
                <input class="c_input--default" id="regular_price" type="number" class=" @error('regular_price') is-invalid @enderror" name="regular_price" value="{{ old('regular_price', $productData->regular_price) }}" autofocus min=0> 円
            </div>
        </div>
        <!-- 通常 価格 END -->


        <!-- 値段 -->

        <div class="l_input__product--price u_display--start--column">
            <label for="price" class="">{{ __('Sale price') }}</label>
            @error('price')
            <span class="c_input--error-msg" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="u_text--align-r">
                <input class="c_input--default" id="price" type="number" class=" @error('price') is-invalid @enderror" name="price" value="{{ old('price',  $productData->price ) }}" autofocus min=0> 円


            </div>
        </div>

        <!-- 値段 END -->


        <!-- ストアID     -->
        <div class="l_input__product--store_id u_display--start--column ">
            <label for="store_id" class="">{{ __('Product store_id') }}</label>
            @error('store_id')
            <span class="c_input--error-msg" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="">
                <input class="c_input--default" id="store_id" type="text" class=" @error('store_id') is-invalid @enderror" name="store_id" value="{{ old('store_id',  $productData->store_id) }}" readonly>
            </div>
        </div>
        <!-- ストアID END  -->

        <!-- 賞味期限 -->

        <div class="l_input__product--sellby u_display--start--column ">
            <label for="sellby" class="">{{ __('Product sellby') }}</label>
            @error('sellby')
            <span class="c_input--error-msg" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="">
                <input class="c_input--default" id="sellby" type="date" class=" @error('sellby') is-invalid @enderror" name="sellby" value="{{ old('sellby',  $productData->sellby) }}" autofocus>

            </div>
        </div>

        <!-- 賞味期限 END -->


        <!-- 画像 -->
        <div class="l_input__product--pic u_display--start--column ">
            <span>{{ __('pic') }} ドラッグ&ドロップ</span>
            @error('pic')
            <span class="c_input--error-msg" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label id="js-dropArea" class="u_parent--100 bg-gray <?php if (!empty($err_msg['pic'])) echo 'err'; ?>">

                <input type="hidden" name="MAX_FILE_SIZE">
                <input id="js-changeFile" class="u_parent--100 opacity-0" type="file" name="pic" class="input-file">
                <img id="js-check-img" src="{{ old('pic' ,  '/storage/' . $productData->pic) }}" alt="ドロップされた画像" class="c_input--prev-img">

            </label>
        </div>

        <!--画像  END -->

{{-- submit update --}}
        <div class="l_input__product--submit u_display--center">
            <button class="btn" type="submit" class="">
                {{ __('Update') }}
            </button>
        </div>
{{-- submit update END--}}



{{-- submit delete --}}
    <div class="l_input__product--submitC u_display--center">
        <button id="js-click-delete" class="btn" type="button" data-id="{{$productData->id}}" >
            {{ __('Delete') }}
        </button>
    </div>
{{-- submit delete END--}}


{{-- submit return --}}
    <div class="l_input__product--submitD u_display--center">
        <button id="js-click-return" class="btn" type="button" >
            {{ __('Return') }}
        </button>
    </div>
{{-- submit return END--}}

</div>
</form>


@endsection