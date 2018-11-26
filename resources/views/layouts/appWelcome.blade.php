<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{{ asset('img/favicon.ico') }}}">
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Font awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    {{-- Animate.css --}}
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    
    {{-- WOW js --}}
    <script src="{{asset('js/wow.min.js')}}"></script>
    

    <style>
        #app {
        }
        .margin-top-navbar {
            min-height: 100vh !important;
            margin-top: 40px;
        }

        .hide-view {
            display: none !important;
        }

        .dropdown-menu a:active {
            background-color: #eee !important;
            color:#000;
        }
        .navbar {
            z-index: 9999;
            display: block;
            opacity: 0.95;
            transition: all 0.5s ease-in;
        }

        .navbar-trans {
            background-color: transparent !important;
            background: transparent !important;
            border-color: transparent !important;
            /*display: none;*/
        }

        .fixed-nav {
            position: fixed;
            top:0;
            width:100vw;
        }
        .navbar-brand {
            font-size: 24px;
        }
        .navbar .nav-button {
            color:white !important;
        }

        footer {
            text-align: center;
            background-color: #1f0a2e;
            color:white;
        }
        footer p {
            padding: 16px 0;
            margin:0;
        }


        /*Landing*/
            #landingImage {
        background-image: url({{ URL::asset('img/bg2.jpg')}});
        /*background-size: contain;*/
        width:100%;
        height:95vh;
        position: absolute;
        top:0;
        background-size: 100%;
        background-repeat: no-repeat;
    }
    #opacityDiv {
        height: 95vh;
        width: 100%;
        position: absolute;
        top:0;
        background-color: black;
        opacity: 0.2;
    }

    #landingContainer {
        height: 95vh;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #landingContent {
        margin-bottom: 180px;
        z-index: 99;
        color:white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    #landingContent h1 {
        text-align: center;
        width: 100%;
        border-bottom: 2px solid white;
    }

    #landingContent a {
        width:200px;
    }

    /*Features*/
    .feature-image {
        padding: 0 !important;
    }

    .hover-info {
        position: absolute;
        bottom:0;
        width:100%;
        height:100%;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: all 0.2s ease-in;
        opacity: 0;
    }

    .hover-info:hover {
        opacity: 1;
        z-index: 99;
    }

    .feat-title {
        border-bottom: solid 2px black;
        width:80%;
        margin:0 auto;
    }

    section {
        padding: 50px 0;
    }

    section h2 {
        margin-top: 16px;
        margin-bottom: 16px;
    }

    #spanHost {
        text-transform: uppercase;
        margin-right: 5px;
    }
    #spanFootball {
        text-transform: uppercase;
        font-weight: 700;
    }

    /*Intro*/
    #intro {
        background-color: #1f0a2e;
        min-height: 25vh;
        color:white;
    }

    #introH4 {
        border-bottom:2px solid white;
        font-size: 32px;
    }

    #intro p {
        font-size: 20px;
    }

    /*Contact*/
    #contact {
        background-image: url({{ URL::asset('img/bg1.jpg')}});
        background-size: 100%;
        background-repeat: no-repeat; 
        opacity: 0.95; 
        height:45vh;
    }

    /*Service*/
    #service h3 {
        margin: 24px; 
    }

    #service p {
        margin: 24px; 
    }

    .client-image {
        width: 130px;
        height: 130px;
    }
    .feat-list {
        width:80%;
        margin:0 auto;
    }
/*    .feat-list ul {
        list-style-image: url({{ URL::asset('img/football-list.jpg')}})
    }*/

    .feat-list li {
        margin: 8px 0;
        padding: 0 0 0 36px;
        list-style: none;
        background-image: url({{ URL::asset('img/football-list.jpg')}});
        background-repeat: no-repeat;
        background-position: left center;
        background-size: 20px;
    }
    </style>

</head>
<body>
    <div id="app">
        <nav id="appNav" class="wow fadeIn navbar navbar-expand-md navbar-dark bg-dark navbar-laravel fixed-nav navbar-trans">
            <div class="container animated slideInUp ">
                <a class="navbar-brand navbar-font" href="{{ url('/') }}">
                   {{'HOST FOOTBALL'}}
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="btn btn-outline-secondary nav-button" href="{{ route('login') }}" style="border:none;">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="btn btn-outline-secondary nav-button" role="button" href="{{ route('register') }}" style="border:none;">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-outline-secondary nav-button" href="
                                 @if(Auth::user()->user_type_id == 1)
                                        {{'/host'}}
                                    @else
                                        {{'/participant'}}
                                    @endif
                                " role="button" style="border:none;">
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown">
                                  <button class="btn btn-outline-secondary dropdown-toggle nav-button" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                  </div>
                                </div>    
                            </li>

{{--                             <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="javascript:;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li> --}}
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        

        @yield('landing')
        {{-- @yield('landing-content') --}}
        <main>
            @yield('content')
        </main>
        <footer>
            <p>Copyright &copy; 2018 &middot; Developed by Host Football</p>
        </footer>
    </div>
</body>
<script>new WOW().init();</script>
<script>
        window.onload = () => {
        $(this).scrollTop(0);
        const adjustHeight = () => {
            let distancePX = $(window).scrollTop();
            let windowHeight = $(window).height();
            let distanceVH = 100*distancePX/windowHeight;
            const appNav = document.querySelector('#appNav');
            // console.log(distanceVH);
            if (distanceVH >= 28) {
                appNav.classList.remove('navbar-trans')
            } else {
               appNav.classList.add('navbar-trans')
            }
        }

       $(window).scroll(function(){
          adjustHeight();
        });
    }
</script>

</html>
