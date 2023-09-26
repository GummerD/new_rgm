@extends('index')

@section('title')

@endsection

@section('content')

<main class="contain">

  <h3 class="profile_username">{{Auth::user()->login}}</h3>

  <div class="profile_content">
    <div class="profile_content_user">
      @if(is_numeric(Auth::user()->profile->path_img))    
      <div class="profile_avatar"><img class="profile_avatar_img" src="{{ asset('asset/Images/photos/fone-125.jpg') }}" alt=""></div>        
      @else
      <div class="profile_avatar"><img class="profile_avatar_img" src="{{asset(Auth::user()->profile->path_img)}}" alt=""></div>
      @endif
      <a href="{{route('profiles.update', ['user' => Auth::user()->id])}}">
        <button class="btn_profile_redact">{{__('Редактировать профиль')}}</button>
      </a>      
    </div>

    <div class="profile_content_rating">
      @foreach ($profile as $prof)
        <li>rating: {{$prof->rating}}</li>
        <li>correct_answer: {{$prof->correct_answer}}</li>
        <li>incorrect_answer: {{$prof->incorrect_answer}}</li>
        <li>num_trainings: {{$prof->num_trainings}}</li>
        <li>progress: {{$prof->progress}}</li>
       @endforeach
    </div> 
     
   
  </div>
</main>
@endsection