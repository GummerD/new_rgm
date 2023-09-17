@extends('index')

@section('title')

@endsection

@section('content')

<main class="contain">

  <h3>Профиль</h3>

  <div class="rules_content">
    {{-- <div class="">{{Auth::user()->profile->avatar->path_img}}</div> --}}
    <p>Логин: {{Auth::user()->login}} </p>
    <p>id: {{Auth::user()->id}}</p>
    <hr>
    @foreach ($profile as $prof)
    <li>user_id: {{$prof->user_id}}</li>
    <li>path_img: {{$prof->path_img}}</li>
    <li>rating: {{$prof->rating}}</li>
    <li>correct_answer: {{$prof->correct_answer}}</li>
    <li>incorrect_answer: {{$prof->incorrect_answer}}</li>
    <li>num_trainings: {{$prof->num_trainings}}</li>
    @endforeach
  </div>
</main>
@endsection