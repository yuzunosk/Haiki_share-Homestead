@extends('layouts.store.app')

@section('content')

<form method="POST" action="{{ route('store.login') }}" enctype="multipart/form-data">
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
                        <input class="u_display--center" id="login-keep" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="u_display--Jstart" for="login-keep">{{ __('Remember Me') }}</label>
                    </div>
                </div>
            </div>
            <!-- ログイン保持 END -->

            <!-- 名前     -->

            <div class="l_login--forgot   l_profile__form--unit">
                <div class="l_profile--form">
                    <a href="{{ route('store.password.request') }}">{{ __('Forgot Your Password?') }}</a>
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


<!-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store.login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('store.password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->