@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('user.login') }}" enctype="multipart/form-data">
    @csrf

    <div class="l_register__select__container u_font__default">
        <div class="l_register__select--head">
            <h2 class="l_register__select--title u_display--center u_font__lage--text">{{ __('Login') }}</h2>
            <p  class="l_register__select--subtitle u_display--center">ログインするアカウントを選択してください</p>
        </div>
        <div class="l_register__select--main">
            <div class="l_register__select--left">
            <a href="/user/login" class=" u_display--center l_register__select--left--box u_font__text--title">ユーザーログイン</a>
            </div>
            <div class="l_register__select--right">
                <a href="/store/login" class=" u_display--center l_register__select--right--box u_font__text--title">ストアーログイン</a>
            </div>
        </div>
        <div class="l_register__select--foot">
            <a class="l_register__select--foot--btn btn btn--white" href="/top">戻る</a>
        </div>

    </div>

</form>
@endsection