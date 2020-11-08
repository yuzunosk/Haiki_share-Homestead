@extends('layouts.store.app')

@section('content')

<form method="POST" action="{{ route('store.register') }}" enctype="multipart/form-data">
    @csrf

    <div class="l_register__container u_font__default u_text--space">

        <div class="l_profile--title  u_display--center  u_font__lage--text">{{ __('Store Register') }}</div>

        <!-- 入力フォーム枠 -->
        <div class="l_register__store__container l_profile--main">

            <!-- 名前     -->

            <div class="l_register--name   l_profile__form--unit">
                <div class="l_profile--text">
                    <label class="u_ds--block" for="store_name" class="">{{ __('Store Name') }}</label>
                    @error('store_name')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="l_profile--form">
                    <textarea class="c_input--textArea" id="store_name" class=" @error('store_name') is-invalid @enderror" name="store_name">{{ old('store_name') }}</textarea>
                </div>
            </div>
            <!-- 名前 END  -->

            <!-- 支店名    -->

            <div class="l_register--b_name   l_profile__form--unit">

                <div class="l_profile--text">
                    <label class="u_ds--block" for="branch_name" class="">{{ __('Branch Name') }}</label>
                    @error('branch_name')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="l_profile--form">
                    <textarea class="c_input--textArea" id="branch_name" class=" @error('branch_name') is-invalid @enderror" name="branch_name" autofocus>{{ old('branch_name') }}</textarea>
                </div>
            </div>
            <!-- 支店名 END  -->

            <!-- 郵便番号 zip    -->

            <div class="l_register--zip   l_profile__form--unit">

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

            <div class="l_register--prefectural   l_profile__form--unit">

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


            <!-- address     -->

            <div class="l_register--address   l_profile__form--unit">
                <div class="l_profile--text">
                    <label class="u_ds--block" for="address" class="">{{ __('address') }}</label>
                    @error('address')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="l_profile--form">
                    <textarea class="c_input--textArea" id="address" class=" @error('address') is-invalid @enderror" name="address" autofocus>{{ old('address') }}</textarea>
                </div>
            </div>
            <!-- address END  -->


            <!-- email     -->

            <div class="l_register--email   l_profile__form--unit">
                <div class="l_profile--text">
                    <label class="u_ds--block" for="email" class="">{{ __('Email') }}</label>
                    @error('email')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                    <input class="c_input--default" id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus>
            </div>
            <!-- email END  -->


            <!-- tel     -->

            <div class="l_register--tel   l_profile__form--unit">
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


            <!-- manager_name 店長名     -->

            <div class="l_register--manager_name l_profile__form--unit">
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

            <div class="l_register--pass   l_profile__form--unit">
                <div class="l_profile--text">
                    <label class="u_ds--block" for="password" class="">{{ __('Password') }}</label>
                    @error('password')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                    <input class="c_input--default" id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" autofocus>
            </div>
            <!-- パスワード  END   -->


            <!-- パスワード確認 -->
            <div class="l_register--re_pass l_profile__form--unit">
                <div class="l_profile--text">
                    <label for="password-confirm" class="u_ds--block">{{ __('Confirm Password') }}</label>
                    @error('re_pass')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                    <input class="c_input--default" id="password-confirm" type="password" name="password_confirmation" >
            </div>
            <!-- パスワード確認 END -->


        </div>





        <div class="l_register--foot u_display--center">
            <button class="btn-3 btn--white" type="submit">
                <p class="btn--text--blk">{{ __('Register') }}</p>
            </button>
        </div>
        <!-- 入力フォーム枠 END -->

        {{-- submit return --}}
        <div id="js-click-return-top" class="l_login--submit  u_display--center">
            <button class="btn__reverse btn--green" type="button" >
                <p class="btn--text--reverse">{{ __('Return') }}</p>
            </button>
        </div>
        {{-- submit return END--}}



    </div>
</form>
@endsection