@extends('layouts.store.app')

@section('content')

<form method="POST" action="{{ route('store.profile.update' , $storeData->id) }}" enctype="multipart/form-data">
    @csrf

    <div class="l_profile__container u_font__default u_text--space">

        <div class="l_profile--title  u_display--center u_font__text--title">{{ __('Profile Edit') }}</div>

        <!-- 入力フォーム枠 -->
        <div class="l_profile__store_form__container l_profile--main">

            <!-- 名前     -->

            <div class="l_profile--name   l_profile__form--unit">
                <div class="l_profile--text">
                    <label class="u_ds--block" for="store_name" class="">{{ __('Store Name') }}</label>
                    @error('store_name')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="l_profile--form">
                    <textarea class="c_input--textArea" id="store_name" class=" @error('store_name') is-invalid @enderror" name="store_name">{{ old('store_name' , $storeData->store_name) }}</textarea>
                </div>
            </div>
            <!-- 名前 END  -->

            <!-- 支店名    -->

            <div class="l_profile--b_name   l_profile__form--unit">

                <div class="l_profile--text">
                    <label class="u_ds--block" for="branch_name" class="">{{ __('Branch Name') }}</label>
                    @error('branch_name')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="l_profile--form">
                    <textarea class="c_input--textArea" id="branch_name" class=" @error('branch_name') is-invalid @enderror" name="branch_name" autofocus>{{ old('branch_name' , $storeData->branch_name) }}</textarea>
                </div>
            </div>
            <!-- 支店名 END  -->


            <!-- email     -->

            <div class="l_profile--email   l_profile__form--unit">
                <div class="l_profile--text">
                    <label class="u_ds--block" for="email" class="">{{ __('Email') }}</label>
                    @error('email')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="l_profile--form">
                    <input class="c_input--default" id="email" type="text" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus>
                </div>
            </div>
            <!-- email END  -->

            <!-- 住所     -->

            <div class="l_profile--address   l_profile__form--unit">
                <div class="l_profile--text">
                    <label class="u_ds--block" for="address" class="">{{ __('Address') }}</label>
                    @error('address')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="l_profile--form">
                    <textarea class="c_input--textArea" id="address" class=" @error('address') is-invalid @enderror" name="address" autofocus>{{ old('address' , $storeData->address) }}</textarea>
                </div>
            </div>
            <!-- 住所 END  -->

            <!-- パスワード     -->

            <div class="l_profile--pass   l_profile__form--unit">
                <div class="l_profile--text">
                    <label class="u_ds--block" for="password" class="">{{ __('Password') }}</label>
                    @error('password')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="l_profile--form">
                    <input class="c_input--default" id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" autofocus>
                </div>
            </div>
        </div>
        <!-- パスワード  END   -->





        <div class="l_profile--foot u_display--center">
            <button class="btn" type="submit" class="">
                {{ __('Update') }}
            </button>
        </div>
        <!-- 入力フォーム枠 END -->

 
        {{-- submit return --}}
        <div class="l_profile--return u_display--center">
            <button id="js-click-return-home" class="btn btn--gray" type="button" >
                {{ __('Return') }}
            </button>
        </div>
        {{-- submit return END--}}


    </div>
</form>
@endsection