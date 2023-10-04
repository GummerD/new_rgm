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
       <div class="admin_look" style="display: flex; flex-direction:column;"> 
            <a href="{{route('admin.profiles')}}"><button>{{__('Посмотреть пользователей')}}</button></a>
            <a href="{{route('admin.tasks')}}"><button>{{__('Посмотреть задачи')}}</button></a>
            <a href="{{route('admin.rules')}}"><button>{{__('Посмотреть правила')}}</button></a>            
            <a href="{{route('admin.level')}}"><button>{{__('Посмотреть уровни')}}</button></a>
            <a href="{{route('admin.groups')}}"><button>{{__('Посмотреть группы упражнений')}}</button></a>
            <a href="{{route('admin.section')}}"><button>{{__('Посмотреть секции упражнений')}}</button></a>
           
        </div>
        <div class="admin_create" style="display: flex; flex-direction:column;">
            <a href="{{route('admin.create.task')}}"><button>{{__('Создать задачу')}}</button></a>
            <a href="{{route('admin.create.rule')}}"><button>{{__('Создать правило')}}</button></a>
            <a href="{{route('admin.create.levGrSec')}}"><button>{{__('создать секции и группы правил упражнений')}}</button></a>
        </div>
    </div>



@endsection