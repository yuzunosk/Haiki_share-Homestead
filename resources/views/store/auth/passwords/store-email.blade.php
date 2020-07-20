@extends('layouts.store.app')

@section('content')
<div class="l_reminder__container">
                <h1 class="l_reminder--title u_display--center">{{ __('Reset Password') }}</h1>

                    <form method="POST" class="l_reminder--main" action="{{ route('store.password.email') }}">
                        @csrf
                        
                        <p class="u_display--Jstart ">{{ __('E-Mail Address Input') }}</p>
                            <label for="email" class="l_reminder--main--textB  u_display--Jstart">
                                <input id="email" type="email" class="c_input--password @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="c_input__default--error-msg" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </label>

                            <div class="l_reminder--main--submit u_display--center">
                                <button type="submit" class="btn--Xlage btn--gray ">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                    </form>
</div>
@endsection
