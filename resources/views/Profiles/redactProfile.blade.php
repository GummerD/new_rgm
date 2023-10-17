@extends('index')

@section('title')

@endsection

@section('content')

<main class="">
    <h3 class="redact_profile_username">{{__('Редактирование профиля ')}}{{$user->login}}</h3>

    <div class="redact_profile_content">
    
        <form class="redact_profile_form form" action="{{route ('profiles.edit', ['user'=>$user])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="">
                <div class="block_form_redact_profile">
                    <input type="file" name="path_img" id="path_img" class="int_redact_profile int_redact_profile_file">
                    <label for="path_img">{{__('Загрузите фото')}}</label>
                    @error("path_img")<p class="text-danger"> {{$message}}</p> @enderror
                </div>

                <div class="block_form_redact_profile">
                    <input type="text" name="login" id="login" class="int_redact_profile" placeholder="{{__('Ваш новый логин')}}" value="{{$user->login}}">
                    <label for="lоgin">{{__('Ваше имя или новый Логин')}}</label>
                    @error("lоgin")<p class="text-danger"> {{$message}}</p> @enderror
                </div>

            </div>
            <div class="">
                <div class="block_form_redact_profile">
                    <input type="email" name="email" id="email" class="int_redact_profile" placeholder="{{__('Ваш новый Email')}}" value="{{$user->email}}">
                    <label for="email">{{__('Введите новый адрес электронной почты')}}</label>
                    @error("email")<p class="text-danger"> {{$message}}</p> @enderror
                </div>

                <div class="block_form_redact_profile">
                    <input type="password" name="password" class="int_redact_profile" id="password" placeholder="{{__('Ваш новый пароль')}}">
                    <label for="password">{{__('Укажите новый пароль')}}</label>    
                    @error("password")<p class="text-danger"> {{$message}}</p> @enderror        
                </div>
            </div>
            
            
            <div class="block_form_redact_profile">
                <input type="password" name="current_password" class="int_redact_profile"  placeholder="{{__('Cтарый пароль')}}">   
                <label for="current_password">{{__('Для подтверждения личности введите, пожалуйста, ваш старый пароль')}}</label> 
                @error("current_password")<p class="text-danger"> {{$message}}</p> @enderror           
            </div>

            
            <button class="btn_redact_profile">{{__('Редактировать')}}</button>

            </div>
        </form>
        
   
  </div>
</main>
@endsection