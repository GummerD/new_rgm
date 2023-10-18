@extends('index')

@section('title')
    {{__('RegExp Кабинет администратора')}}
@endsection

@section('content')
    <div class="admin_content">
         <p  class = 'admin_page_title' >
            Кабинет Администратора,
         привет {{Auth::user()->login}}!
         </p>
    </div>

    <div class="admin_navigate ">
       <div class="admin_look" style="display: flex; flex-direction:column; width:300px"> 
            <a href="{{route('admin.profiles')}}"  style="color:rgb(183, 155, 155); margin-top:6px;">{{__('- Посмотреть пользователей')}}</a>
            <a href="{{route('admin.tasks')}}" style="color:rgb(183, 155, 155); margin-top:6px;">{{__('- Посмотреть задачи')}}</a>
            <a href="{{route('admin.rules')}}" style="color:rgb(183, 155, 155); margin-top:6px;">{{__('- Посмотреть правила')}}</a>            
            <a href="{{route('admin.level')}}" style="color:rgb(183, 155, 155); margin-top:6px;">{{__('- Посмотреть уровни')}}</a>
            <a href="{{route('admin.groups')}}" style="color:rgb(183, 155, 155); margin-top:6px;">{{__('- Посмотреть группы упражнений')}}</a>
            <a href="{{route('admin.section')}}" style="color:rgb(183, 155, 155); margin-top:6px;">{{__('- Посмотреть секции упражнений')}}</a>
           
        </div style="margin-top:16px; ">
        <div class="admin_create" style="display: flex; flex-direction:column; width:400px">
            <a href="{{route('admin.create.task')}}" style="color:rgb(219, 195, 176); margin-top:6px;">{{__('- Создать задачу')}}</a>
            <a href="{{route('admin.create.rule')}}" style="color:rgb(219, 195, 176); margin-top:6px;">{{__('- Создать правило')}}</a>
            <a href="{{route('admin.create.levGrSec')}}" style="color:rgb(219, 195, 176); margin-top:6px;">{{__('- Cоздать секции и группы правил упражнений')}}</a>
        </div>
    </div>



@endsection