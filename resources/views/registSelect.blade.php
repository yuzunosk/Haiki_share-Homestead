@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('user.register') }}" enctype="multipart/form-data">
    @csrf

    <div class="l_register__select__container u_font__default">
        <div class="l_register__select--head">
            <h2 class="l_register__select--title u_display--center u_font__lage--text">{{ __('Register') }}</h2>
            <p  class="l_register__select--subtitle u_display--center">利用者登録、または利用店舗登録をしてください</p>
        </div>
        <div class="l_register__select--main  u_display--center--column">
            <div class="l_register__select--top">
            <a href="/user/register" class="u_display--center l_register__select--top--box u_font__text--title">ユーザー登録</a>
            </div>
            <div class="l_register__select--bottom">
                <a href="/store/register" class="u_display--center l_register__select--bottom--box u_font__text--title">ストアー登録</a>
            </div>
        </div>
        <div class="l_register__select--foot">
            <a class="l_register__select--foot--btn btn__reverse btn--green" href="/top">
                <p class="btn--text--reverse">{{ __('Return') }}</p>
            </a>
        </div>

    </div>

</form>
@endsection