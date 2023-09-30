@extends('index')

@section('title')
    {{__('RegExp Кабинет администратора')}}
@endsection

@section('content')
    <div class="admin_content">
         <p>
            Кабинет Администратора,
         привет {{Auth::user()->login}}!
         </p>
    </div>

    <div class="admin_navigate">
        <a href="{{route('admin.profiles')}}"><button>{{__('Посмотреть пользователей')}}</button></a>
        <a href="{{route('admin.tasks')}}"><button>{{__('Посмотреть задачи')}}</button></a>
        <a href="{{route('admin.rules')}}"><button>{{__('Посмотреть правила')}}</button></a>
    </div>
@endsection