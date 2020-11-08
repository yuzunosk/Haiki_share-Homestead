@extends('layouts.store.app')

@section('content')

<form method="POST" action="{{ route('store.profile.update' , $storeData->id) }}" enctype="multipart/form-data">
    @csrf

    <div class="l_profile__container u_font__default u_text--space">

        <div class="l_profile--title  u_display--center u_font__lage--text">{{ __('Profile Edit') }}</div>

        <!-- 入力フォーム枠 -->
        <div class="l_profile__store_form__container l_profile--main">

            <!-- 名前     -->

            <div class="l_profile--name   l_profile__form--unit">
                <div class="l_profile--text ">
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

            <!-- tel     -->

            <div class="l_profile--tel   l_profile__form--unit">
                <div class="l_profile--text">
                    <label class="u_ds--block" for="tel" class="">{{ __('tel') }}</label>
                    @error('tel')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                    <input class="c_input--default" id="tel" type="text" class=" @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" autofocus 
                    pattern="\d{2,4}-?\d{2,4}-?\d{3,4}">
            </div>
            <!-- tel END  -->

                        <!-- 郵便番号 zip    -->

            <div class="l_profile--zip   l_profile__form--unit">

                <div class="l_profile--text">
                    <label class="u_ds--block" for="zip">{{ __('zip') }}</label>
                    @error('zip')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                    <input class="c_input--default" id="zip" type="text" class=" @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}" autofocus>
            </div>
            <!-- 郵便番号 zip END  -->


            <!-- prefectural  県名  -->

            <div class="l_profile--prefectural   l_profile__form--unit">

                <div class="l_profile--text">
                    <label class="u_ds--block" for="prefectural" class="">{{ __('prefectural') }}</label>
                    @error('prefectural')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                {{-- オプションセレクトに変更 --}}
                <div class="l_profile--form">
                    
                    <select class="c_input--default" id="prefectural" class=" @error('prefectural') is-invalid @enderror" name="prefectural" value="{{ old('prefectural') }}" autofocus>
                        @foreach(Config('pref') as $key => $value)
                        <option value="{{ $value }}" @if(old('prefectural') == $key) selected @endif>{{ $value }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <!-- prefectural  県名 END  -->

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


            <!-- manager_name 店長名     -->

            <div class="l_profile--manager_name l_profile__form--unit">
                <div class="l_profile--text">
                    <label class="u_ds--block" for="manager_name" class="">{{ __('manager_name') }}</label>
                    @error('manager_name')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                    <input class="c_input--default" id="manager_name" type="text" class=" @error('manager_name') is-invalid @enderror" name="manager_name" value="{{ old('manager_name') }}" autofocus>
            </div>
            <!-- manager_name 店長名  END  -->

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
            <button class="btn-3 btn--white" type="submit">
                <p class="btn--text--blk">{{ __('Update') }}</p>
            </button>
        </div>
        <!-- 入力フォーム枠 END -->

 
        {{-- submit return --}}
        <div id="js-click-return-home2" class="l_profile--return u_display--center">
            <button class="btn__reverse btn--green" type="button" >
                <p class="btn--text--reverse">{{ __('Return') }}</p>
            </button>
        </div>
        {{-- submit return END--}}

    </div>
</form>
@endsection