@extends('layouts.store.app')

@section('content')
<div class="l_passreset__container">
    <h1 class="l_passreset--title u_display--center">{{ __('Reset Password') }}</h1>

                    <form method="POST"  class="l_passreset--main u_font__text--title" action="{{ route('store.password.update') }}">
                        @csrf

                        <p class="l_passreset--main--textA u_display--center">
                            {{ __('Auth Key') }}</p>

                            <label for="token" class="l_passreset--main--formA  ">
                            
                                
                                <input id="token" type="text" class="c_input--default @error('token') is-invalid @enderror" name="token" value="{{old('token')}}" required autocomplete="token" autofocus>
                                
                                @error('token')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </label>

                            <p class="l_passreset--main--textB u_display--center">
                                {{ __('Password') }}</p>

                            <label for="password" class="l_passreset--main--formB">
                                
                                <input id="password" type="password" class="c_input--default @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </label>

                            <p class="l_passreset--main--textC  u_display--center">
                                {{ __('Confirm Password') }}</p>
                            
                        <label for="password-confirm" class="l_passreset--main--formC">

                            
                                <input id="password-confirm" type="password" class="c_input--default" name="password_confirmation" required autocomplete="new-password">
                            </label>

                        <div class="l_passreset--main--submit u_display--center">
                                <button type="submit" class="btn--Xlage btn--gray ">
                                    {{ __('Reset Password') }}
                                </button>
                        </div>

                    </form>
</div>
@endsection
