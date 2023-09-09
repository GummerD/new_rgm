<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('asset/css/Includes/header.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/reg_background.css') }}">

    {{-- 
        Шрифты:

        npm install @fontsource/anonymous-pro
        npm install @fontsource/roboto-mono
        
    --}}

    

        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
 
     <!-- Scripts -->
     @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    



</head>
<body>

    

    
<div class="big_contain">

           @include('Includes.header')

        @yield('content')

        <div class="img_fon"></div>
    
    @include('Includes.footer')</div>
    
</body>


<script src="{{asset('asset/js/first_task_example.js')}}"></script>


</html>