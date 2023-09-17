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
    <p>{{ $profile->get() }}</p>
    {{-- @foreach ($profile as $prof)
    <li>{{$prof}}</li>
    @endforeach --}}
  </div>
</main>
@endsection