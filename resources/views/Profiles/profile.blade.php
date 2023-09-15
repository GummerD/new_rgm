@extends('index')
@section('title')
@endsection

@section('content')

<main class="contain content">
    <div class="">
        {{-- <div class="">{{Auth::user()->profile->avatar->path_img}}</div> --}}
        {{Auth::user()->login}}

    </div>
    <div class=""></div>
</main>
@endsection             