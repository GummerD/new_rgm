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
       <div class="admin_look"> 
            <a href="{{route('admin.profiles')}}"><button>{{__('Посмотреть пользователей')}}</button></a>
            <a href="{{route('admin.tasks')}}"><button>{{__('Посмотреть задачи')}}</button></a>
            <a href="{{route('admin.rules')}}"><button>{{__('Посмотреть правила')}}</button></a>
        </div>
        <div class="admin_create">
            <a href="{{route('admin.create.task')}}"><button>{{__('Создать задачу')}}</button></a>
            <a href="{{route('admin.create.rule')}}"><button>{{__('Создать правило')}}</button></a>
        </div>
    </div>



@endsection