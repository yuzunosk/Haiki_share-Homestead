<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css' , true) }}" rel="stylesheet">
</head>

<body class="l_site__area">
    <div class="l-site__warapper">

        <nav class="l-header">
                <a class="l-header__left  u_site--title u_site--title--bold u_display--center" href="{{ url('/store/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <!-- ログインしてなければ表示 -->
                @unless(Auth::guard('store')->check())
                    <div class="display-pc">
                        <div class="l-header__right">
                            <a class="l-header__right__text l-header__right__2" href="{{ route('LoginSelect') }}"><i class="l-header__right__icon fas fa-sign-in-alt  fa-2x mr-10"></i>{{ __('Login') }}</a>
                            <a class="l-header__right__text l-header__right__3" href="{{ route('RegistSelect') }}"><i class="l-header__right__icon fas fa-glass-cheers  fa-2x mr-10"></i>{{ __('Singin') }}</a>
                        </div>
                    </div>
                    <div class="display-sm">
                        <div class="l-header__right">
                            <i class="fas fa-bars fa-5x l-header__right__4 u_display--center"></i>
                        </div>
                    </div>
                @endunless
                    @if(Auth::guard('store')->check())
                    {{-- PCからみた場合 --}}
                    <div class="display-pc">
                        <div class="l-header__right">
                            {{-- <a class="l-header__right__text l-header__right__2" href="{{ route('home') }}"><i class="fas fa-store-alt fa-2x mr-10"></i>{{ $storeData->store_name }}</a> --}}
                            <button type="button" id="js-click-return-home" class="l-header__right__text l-header__right__2 u_text--gurad"><i class="l-header__right__icon fas fa-store-alt fa-2x mr-10"></i>{{ $storeData->store_name }}</button>
                            <form id="logout-form" action="{{ route('store.logout') }}" method="POST" class="l-header__right__3">
                                @csrf
                                <button type="submit" class="l-header__right__text" ><i class="l-header__right__icon fas fa-sign-out-alt fa-2x mr-10"></i>{{ __('Logout') }}</button>
                            </form>
                        </div>
                    </div>
                    {{-- スマホからみた場合 --}}
                    <div class="display-sm">
                        <div  id="js-click-popup" class="l-header__right">
                            <i class="fas fa-bars fa-5x l-header__right__4 u_display--center"></i>
                        </div>
                    </div>
                @endif
        </nav>

        {{-- jsでポップアップさせるメニュー --}}
        <nav id="js-popup-menu"  class="l-header__popmenu">
            @unless(Auth::guard('store')->check())
                <div class="c-header__popmenu">
                    <a class="c-header__popmenu--list c-header__popmenu--left" href="{{ route('LoginSelect') }}"><i class="fas fa-sign-in-alt  fa-x mr-10"></i>{{ __('Login') }}</a>
                    <a class="c-header__popmenu--list c-header__popmenu--right" href="{{ route('RegistSelect') }}"><i class="fas fa-glass-cheers  fa-x mr-10"></i>{{ __('Singin') }}</a>
                </div>
            @endunless

            @if(Auth::guard('store')->check())
            <div class="c-header__popmenu">
                <button type="button" id="js-click-return-home" class="c-header__popmenu--list c-header__popmenu--left"><i class="fas fa-store-alt fa-2x mr-10"></i>{{ $storeData->store_name }}</button>
                <form id="logout-form" action="{{ route('store.logout') }}" method="POST" class="c-header__popmenu--list">
                    @csrf
                    <button type="submit" class="c-header__popmenu--list c-header__popmenu--right" ><i class="fas fa-sign-out-alt fa-2x mr-10"></i>{{ __('Logout') }}</button>
                </form>
            </div>
            @endif
        </nav>
        {{-- jsで現れる透明の幕 --}}
            <div id="js-popup-mask" class="c-header--mask"></div>
        {{-- jsでポップアップさせるメニュー end --}}

                <!-- フラッシュメッセージ -->
                @if (session('flash_message'))
                <div  id="js-flash-message" class="u_alert--red u_size__icon--label" role="alert">
                    {{ session('flash_message') }}
                </div>
                @endif

        <div id="app" class="l_main__container">
            <main class="">
            @yield('content')
            </main>
        </div>




        <footer class="l_footer">
            <div class=" l_footer__container">
                <div class="l_footer__layout--top u_display--center">
                    <img class="u_size__icon--md" src="/storage/img/HaikiYasan_Logo.png" alt="">

                </div>
                <div class="l_footer__layout--bottom u_display--center--column">
                    {{-- コンタクトを隠す --}}
                    {{-- <div class="u_img__unit">
                        <img class="img__icon u_size__icon--sm" src="/storage/img/email-iconA.png" alt="">
                        <span class="u_white--text text-size__def mb-30">contact</span>
                    </div> --}}
                    <h5 class="u_white--text text-size__min mb-30">©︎2020 yuzunosk website, inc. <a href="https://icons8.jp/license">icons.8</a></h5>
                </div>
            </div>
        </footer>

    </div>

    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <script src="{{ asset('js/app.js' , true) }}"></script>

</body>

</html>