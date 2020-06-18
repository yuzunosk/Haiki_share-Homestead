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




    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="l_site__area">
    <div class="l-site__warapper">

        <!-- フラッシュメッセージ -->
        @if (session('flash_message'))
        <div class="alert alert-primary text-center" role="alert">
            {{ session('flash_message') }}
        </div>
        @endif

        <nav class="l-header">
            <div>
                <a class="u_site--title u_display--center" href="{{ url('/top') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            <div class="l-header__nav">
                <!-- ログインしてなければ表示 -->
                @unless(Auth::guard('store')->check())
                <div class="c_nav-menu">
                    <li class="u_display--center u_font__default text-color--default">
                        <a class="nav-link" href="{{ route('store.login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="u_display--center u_font__default text-color--default">
                        <a class="nav-link" href="{{ route('store.register') }}">{{ __('Singin') }}</a>
                    </li>

                </div>
                @endunless
                @if(Auth::guard('store')->check())
                <div class="c_nav-menu">
                    <form id="logout-form" action="{{ route('store.logout') }}" method="POST">
                        @csrf
                        <li class="u_display--center u_font__default text-color--default">
                            <button type="submit" class="nav-link" href="{{ route('store.logout') }}">{{ __('Logout') }}</button>
                        </li>
                    </form>
                </div>
                @endif
            </div>
        </nav>

        <div id="app" class="l_main__container">

            @yield('content')
        </div>




        <footer class="l_footer">
            <div class=" l_footer__container">
                <div class="l_footer__layout--top u_display--center">
                    <img class="u_size__icon--md" src="/storage/img/HaikiYasan_Logo.png" alt="">

                </div>
                <div class="l_footer__layout--bottom u_display--center--column">
                    <div class="u_img__unit">
                        <img class="img__icon u_size__icon--sm" src="/storage/img/email-iconA.png" alt="">
                        <span class="u_white--text text-size__def mb-30">contact</span>
                    </div>
                    <h5 class="u_white--text text-size__min mb-30">©︎2020 yuzunosk website, inc. <a href="https://icons8.jp/license">icons.8</a></h5>
                </div>
            </div>
        </footer>

    </div>


    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>