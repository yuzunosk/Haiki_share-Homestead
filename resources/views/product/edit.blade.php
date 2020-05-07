@extends('layouts.app')

@section('content')
<div class="">
    <div class="">
        <div class="">
            <div class="">
                <div class="">{{ __('Product New') }}</div>

                <div class="">
                    <form method="POST" action="{{ route('store.product.create') }}">
                        @csrf

                        <!-- 名前     -->
                        <div class="">
                            <label for="name" class="">{{ __('Product Name') }}</label>

                            <div class="">
                                <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name', $productData->name) }}" required autocomplete="name" autofocus>

                                @error('email')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- 名前 END  -->


                        <!-- カテゴリー -->
                        <div class="">
                            <label for="category" class="">{{ __('category') }}</label>

                            <div class="">
                                <select name="category" id="category">
                                    <option value="999">-- 選択してください --</option>
                                    <option value="パン">パン</option>
                                    <option value="おにぎり">おにぎり</option>
                                    <option value="サンドイッチ">サンドイッチ</option>
                                    <option value="お弁当">お弁当</option>
                                    <option value="スイーツ">スイーツ</option>
                                </select>

                                @error('category')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- カテゴリー END -->


                        <!-- 値段 -->

                        <div class="">
                            <label for="price" class="">{{ __('Product price') }}</label>

                            <div class="">
                                <input id="price" type="number" class=" @error('price') is-invalid @enderror" name="price" value="{{ old('price', $productData->price) }}" autofocus placeholder=0 min=0>

                                @error('price')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- 値段 END -->

                        <!-- 賞味期限 -->

                        <div class="">
                            <label for="sellby" class="">{{ __('Product sellby') }}</label>

                            <div class="">
                                <input id="sellby" type="date" class=" @error('sellby') is-invalid @enderror" name="sellby" value="{{ old('sellby', $productData->sellby) }}" autofocus>

                                @error('sellby')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- 賞味期限 END -->


                        <!-- 画像 -->
                        <div class="">
                            <label class="area-drop <?php if (!empty($err_msg['pic'])) echo 'err'; ?>" style="height:370px;line-height:370px;">
                                <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
                                <input type="file" name="pic" class="input-file" style="height:370px;">
                                <img src="<?php echo "関数を作る？" ?>" alt="" class="prev-img">
                                ドラッグ＆ドロップ
                            </label>
                        </div>

                        <!--画像  END -->


                        <!-- ストアID     -->
                        <div class="">
                            <label for="store_id" class="">{{ __('Product store_id') }}</label>

                            <div class="">
                                <input id="store_id" type="text" class=" @error('store_id') is-invalid @enderror" name="store_id" value="{{ old('store_id', $productData->store_id) }}" autofocus>

                                @error('store_id')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- ストアID END  -->

                        <div class=>
                            <div class="">
                                <button type="submit" class="">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection