@extends('index')

@section('title')
    {{__('Кабинет администратора')}}
@endsection

@section('content')
    <div class="admin_content">
         <p>
           {{__("Пользователи сервиса")}}
         </p>
    </div>

   

    <div class="admin_navigate">
       @foreach ($profiles as $item)

           {{$item->login}}
           {{$item->email}}

          {{$item->profile->user_status}} 

          <br/>
        @endforeach
    </div>
</div>
@endsection