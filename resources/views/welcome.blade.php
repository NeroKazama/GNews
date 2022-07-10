<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" async></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light nav-bar shadow">
            <div class="container">
                <div class="col-12 text-center m-auto">
                    <ul class="w-100 d-inline-flex" id="main">
                        <li class="col-lg-1 col-md-1 col-sm-4">
                            <a class="" href="/">
                                <img class="position-absolute w-75 logo " style="left: 0px" src="img/logo.svg" alt="">
                            </a>
                        </li>
                        <li class="col-lg-6 col-md-6 col-sm-6"></li>
                        <li class="col-lg-2 col-md-2 col-sm-4 float-right mt-4"><a class="white" href="#">Main Page</a></li>
                        @if(Auth::check())
                            <li class="col-lg-1 col-md-1 col-sm-3 float-right mt-4"><a class="m-btn m-btn-primary white" href="/profile">Profile</a></li>
                            <li class="col-lg-1 col-md-1 col-sm-3 float-right mt-4"><a class="m-btn m-btn-primary white" href="/logout">Log Out</a></li>
                        @else
                            <li class="col-lg-2 col-md-2 col-sm-4 float-right mt-4"><a class="m-btn m-btn-primary white" href="{{route('login')}}">Login/SignUp</a></li>  
                        @endif  
                    </ul>
                    <a class="float-right nav-bar-s-btn" @click.prevent="NavBarPhoneScreen == true ? NavBarPhoneScreen = false : NavBarPhoneScreen = true" href="#">
                        <img class="w-50" src="img/bars-solid.svg" alt=""></a>
                </div>
            </div>
        </nav>
        <div class="h-100 position-fixed" style="top: 1px; z-index: 9990">
            <ul class="h-100 nav-bar-s" v-if="NavBarPhoneScreen == true" id="main">
                <li class="col-8"><a class="white" href="/">Main Page</a></li>
                @if(Auth::check())
                    <li class="col-8"><a class="m-btn m-btn-primary white" href="/profile">Profile</a></li>
                    <li class="col-8"><a class="m-btn m-btn-primary white" href="/logout">Log Out</a></li>
                @else
                    <li class="col-8"><a class="m-btn m-btn-primary white" href="#">Login/SignUp</a></li> 
                @endif
            </ul>
        </div>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>