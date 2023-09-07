<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RegExp master</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
    
    </head>
    <body class="antialiased">
       <div class="start">

        <div class="startheader">

            <button><a href="{{route('profiles')}}">Личный кабинет</a></button>
        </div>
         
        <div class="startBody">
            <div class="description">Это приложение научит Вас работать с регулярными выражениями на конкретных примерах.
                RegExp для всех, кто хочет расширить свои знания о регулярных выражениях, познакомиться с новыми приемами и узнать все тонкости работы с ними а так же отточить навыки.
                
                Наше приложение подойдет как начинающим так и уже опытным IТ специалистам и менеджерам из разных сфер.
                
                Вы сможете решать задачи, путем написания правильного регулярного выражения, начиная с простых и заканчивая самыми сложными задачами!</div>
            <button><a href="{{route('rules')}}">{{__('Посмотреть правила')}}</a></button>
        </div>

       </div>
       


       @include('Includes.footer')
    </body>
</html>
