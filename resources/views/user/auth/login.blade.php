@extends('layouts.user.app')

@section('content')

<form method="POST" action="{{ route('user.login') }}" enctype="multipart/form-data">
    @csrf

    <div class="l_login__container u_font__default u_text--space">

        <div class="l_login--title  u_display--center u_font__text--title">{{ __('User Login') }}</div>

        <!-- 入力フォーム枠 -->
        <div class="l_login__form__container l_profile--main">


            <!-- email     -->

            <div class="l_login--email   l_profile__form--unit">
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


            <!-- パスワード     -->

            <div class="l_login--pass l_profile__form--unit">
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
            <!-- パスワード  END   -->

            <!-- ログイン保持 -->
            <div class="l_login--keep l_profile__form--unit">
                <div class="l_profile--form">
                    <div class="l_input--check">
                        <input class="u_display--center" id="login-keep" type="checkbox" name="password_confirmation" {{ old('remember') ? 'checked' : '' }}>
                        <label class="u_display--Jstart" for="login-keep">{{ __('Remember Me') }}</label>
                    </div>
                </div>
            </div>
            <!-- ログイン保持 END -->

            <!-- 名前     -->

            <div class="l_login--forgot   l_profile__form--unit">
                <div class="l_profile--form">
                    <a href="{{ route('user.password.request') }}">{{ __('Forgot Your Password?') }}</a>
                </div>
            </div>
            <!-- 名前 END  -->


        </div>





        <div class="l_login--foot u_display--center">
            <button class="btn" type="submit" class="">
                {{ __('Login') }}
            </button>
        </div>
        <!-- 入力フォーム枠 END -->



    </div>
</form>
@endsection