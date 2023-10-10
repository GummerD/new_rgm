<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- Styles --}}
  <link rel="stylesheet" href="{{ asset('asset/css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/Includes/header.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/Includes/footer.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/Includes/regLogin.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/Includes/menuProfile.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/Includes/alerts.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/Includes/registr_log_component.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/pages/rulesPage.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/pages/profile.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/pages/tasksPage.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/pages/redactProfile.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/pages/adminPage.css') }}">
  


  {{-- Шрифты: --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https: //fonts.googleapis.com/css2?family= семья= Аноним+Про:wght@400;700 & display=swap"
    rel="stylesheet">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Anonymous+Pro:wght@400;700&family=Roboto+Mono:ital,wght@0,200;0,300;0,400;0,600;0,700;1,200;1,300;1,400;1,500;1,600&display=swap"
    rel="stylesheet">


  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Document</title>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])



</head>

<body class="rast">

    <div class="verx soder">

      @include('Includes.header')     

      <div class="black_fon">

        <div class="contain">
          
          @yield('content')   
              
        </div>
        @include('Includes.message')  
       
      </div>

    </div>
    @include('Includes.footer')
 

 @stack('jsDel')
</body>


</html>