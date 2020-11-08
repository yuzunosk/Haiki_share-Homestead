@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('submit.post') }}" enctype="multipart/form-data">
    @csrf

    <div class="l_register__container u_font__default u_text--space">

        <div class="l_register--title  u_display--center u_font__text--title">{{ __('Submission Form') }}</div>

        <!-- 入力フォーム枠 -->
        <div class="l_register__info__container l_profile--main">

            <!-- 名前  -->

            <div class="l_register--name   l_profile__form--unit">
                <div class="l_profile--text">
                    <label class="u_ds--block" for="name" class="">{{ __('Name') }}</label>
                    @error('name')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="l_profile--form">
                    <input class="c_input--default" id="name" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name' ) }}" autofocus>
                </div>
            </div>
            <!-- 名前 END  -->


            <!-- email  -->

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


            <!-- Subject  -->
            <div class="l_register--subject   l_profile__form--unit">
                <div class="l_profile--text">
                    <label class="u_ds--block" for="subject" class="">{{ __('subject') }}</label>
                    @error('subject')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="l_profile--form">
                    <input class="c_input--default" id="subject" type="text" class=" @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" autofocus>
                </div>
            </div>
            <!-- Subject END  -->


            <!-- content -->

            <div class="l_register--content   l_profile__form--unit">
                <div class="l_profile--text">
                    <label class="u_ds--block" for="content" class="">{{ __('content') }}</label>
                    @error('content')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="l_profile--form">
                        <textarea class="c_input--textArea--large @error('content') is-invalid @enderror" name="content" id="content" cols="30" rows="10"></textarea>
                </div>
            </div>
            <!--  content END  -->

        </div>

        <div class="l_register--foot u_display--center">
            <button class="btn" type="submit" class="">
                {{ __('Send') }}
            </button>
        </div>
        <!-- 入力フォーム枠 END -->

        {{-- submit return --}}
        <div id="js-click-return-top" class="l_login--submit  u_display--center">
            <button class="btn btn--green" type="button" >
                {{ __('Return') }}
            </button>
        </div>
        {{-- submit return END--}}



    </div>
</form>
@endsection