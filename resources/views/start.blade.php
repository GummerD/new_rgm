<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
            <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Document</title>
      
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        {{-- Styles --}}
        <link rel="stylesheet" href="{{ asset('asset/css/Includes/footer.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/Includes/menuProfile.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/Includes/registr_log_component.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/pages/startPage.css') }}">


        <!-- Fonts -->

        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
      
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https: //fonts.googleapis.com/css2?family= семья= Аноним+Про:wght@400;700 & display=swap" rel="stylesheet">


        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anonymous+Pro:wght@400;700&family=Roboto+Mono:ital,wght@0,200;0,300;0,400;0,600;0,700;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    


        <!-- Styles -->
    
    </head>

    <body class="start">
        <div class="start_fon">    

           <div class="start_gradient">

                

                    <header class="startheader ">
            
                        <nav class="navbar navbar-expand-md navbar-light contain">
                        
                            <a class="navbar-brand " href="{{ route('start') }}">
                                <img  class="logo_start" src="{{asset('asset/Images/Icons/logo.png')}}" alt="">
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <!-- Left Side Of Navbar -->
                                               
                                    <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ms-auto">
                                        <!-- Authentication Links -->
                                     @guest
                                        <div class="register_login_comp">
                                            @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a  href="{{ route('login') }}">
                                                    <button class="log_component">{{ __('Login') }}</button>
                                                </a>
                                            </li>
                                        @endif
            
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a  href="{{ route('register') }}">
                                                    <button class="register_component">{{ __('Register') }}</button>
                                                </a>
                                            </li>
                                        @endif
                                        </div>

                                        @else
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle icon_header_a" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    <img class="icon_header" src="{{asset('asset/Images/Icons/icons8-user.png')}}">
                                                </a>
                                                <p class="user_name_start"> {{ Auth::user()->login }}</p>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                   
                                                    <a class="dropdown-item" href="{{route('profiles')}}">{{__('Личный кабинет')}}</a>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                                                    @if ((Auth::user()->profile->user_status) === "admin")

                                                    <a class="dropdown-item" href="{{route('admin')}}">{{__('Кабинет администратора')}}</a>
                
                                                    @endif  
                
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>

                                                </div>
                                            </li>
                                    @endguest
                                </ul>
                               
                            </div>
                        </nav>
                        
                    </header>
            
                    <div class="line_header"></div>
                
                    <main class="content_start contain">
                    
                        <div class="description">Это приложение научит Вас работать с регулярными выражениями на конкретных примерах.
                            RegExp для всех, кто хочет расширить свои знания о регулярных выражениях, познакомиться с новыми приемами и узнать все тонкости работы с ними а так же отточить навыки.
                            <br/>  
                            <br/>   
                            Наше приложение подойдет как начинающим так и уже опытным IТ специалистам и менеджерам из разных сфер.
                            <br/>   
                            <br/>  
                            Вы сможете решать задачи, путем написания правильного регулярного выражения, начиная с простых и заканчивая самыми сложными задачами!
                        </div>
                        <div class="start_rules">
                            <div class=""><img src="{{asset('asset/Images/Background/reg.png')}}" alt=""></div>
                            <a href="{{route('rules')}}"><button class="btn_rules_start"> {{__('Посмотреть правила')}}</button></a>
                        </div>
                    
                
                    </main>
                </div>            
       
           
        </div>
      

        @include('Includes.footer')

    </body>
</html>
