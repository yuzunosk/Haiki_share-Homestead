@extends('layouts.user.app')

@section('content')

<form method="POST" action="" enctype="multipart/form-data">
    @csrf

    <div class="l_register__container u_font__default u_text--space">

        <div class="l_profile--title  u_display--center u_font__text--title">{{ __('Register') }}</div>

        <!-- 入力フォーム枠 -->
        <div class="l_register__store__container l_profile--main">

            <!-- 名前     -->

            <div class="l_register--name   l_profile__form--unit">
                <div class="l_profile--text">
                    <label class="u_ds--block" for="name" class="">{{ __('Store Name') }}</label>
                    @error('name')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="l_profile--form">
                    <textarea class="c_input--textArea" id="name" class=" @error('name') is-invalid @enderror" name="name">{{ old('name') }}</textarea>
                </div>
            </div>
            <!-- 名前 END  -->

            <!-- 支店名    -->

            <div class="l_register--b_name   l_profile__form--unit">

                <div class="l_profile--text">
                    <label class="u_ds--block" for="branch_name" class="">{{ __('Branch Name') }}</label>
                    @error('name')
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
                <div class="l_profile--form">
                    <input class="c_input--default" id="email" type="text" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus>
                </div>
            </div>
            <!-- email END  -->


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
                <div class="l_profile--form">
                    <input class="c_input--default" id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" autofocus>
                </div>
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


                <div class="l_profile--form">
                    <input class="c_input--default" id="password-confirm" type="password" name="password_confirmation" required>
                </div>
            </div>
            <!-- パスワード確認 END -->


        </div>





        <div class="l_register--foot u_display--center">
            <button class="btn" type="submit" class="">
                {{ __('Register') }}
            </button>
        </div>
        <!-- 入力フォーム枠 END -->



    </div>
</form>
@endsection