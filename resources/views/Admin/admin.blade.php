@extends('index')

@section('title')
{{__('RegExp Кабинет администратора')}}
@endsection

@section('content')
<p>xi</p>

<div style="display: flex; justify-content:space-around; flex-wrap:wrap; margin: 70px;">

  <a href="{{route('admin.profiles')}}" class="card mb-3"
    style="width: 7rem; display: block; background-color: rgba(64, 144, 67, 0.6); box-shadow: 0px 4px 4px 0px rgba(255, 255, 255, 0.3) inset, 0px 4px 8px 0px rgba(0, 0, 0, 0.75); color: rgba(255, 255, 255, 1);">
    <div class="card-header" style="text-align: center; font-size: 16px">USERs</div>
    <hr style="color: aliceblue; margin: 0">
    <p class="card-text" style="text-align: center; font-size: 35px">{{$users->count()}}
    </p>
  </a>

  <a href="{{route('admin.tasks')}}" class="card mb-3"
    style="width: 7rem; display: block; background-color: rgba(64, 144, 67, 0.6); box-shadow: 0px 4px 4px 0px rgba(255, 255, 255, 0.3) inset, 0px 4px 8px 0px rgba(0, 0, 0, 0.75); color: rgba(255, 255, 255, 1);">
    <div class="card-header" style="text-align: center; font-size: 16px">TASKs</div>
    <hr style="color: aliceblue; margin: 0">
    <p class="card-text" style="text-align: center; font-size: 35px">{{$tasks->count()}}
    </p>
  </a>

  <a href="{{route('admin.rules')}}" class="card mb-3"
    style="width: 7rem; display: block; background-color: rgba(64, 144, 67, 0.6); box-shadow: 0px 4px 4px 0px rgba(255, 255, 255, 0.3) inset, 0px 4px 8px 0px rgba(0, 0, 0, 0.75); color: rgba(255, 255, 255, 1);">
    <div class="card-header" style="text-align: center; font-size: 16px">RULEs</div>
    <hr style="color: aliceblue; margin: 0">
    <p class="card-text" style="text-align: center; font-size: 35px">{{$rules->count()}}
    </p>
  </a>

  <a href="{{route('admin.level')}}" class="card mb-3"
    style="width: 7rem; display: block; background-color: rgba(64, 144, 67, 0.6); box-shadow: 0px 4px 4px 0px rgba(255, 255, 255, 0.3) inset, 0px 4px 8px 0px rgba(0, 0, 0, 0.75); color: rgba(255, 255, 255, 1);">
    <div class="card-header" style="text-align: center; font-size: 16px">LEVELs</div>
    <hr style="color: aliceblue; margin: 0">
    <p class="card-text" style="text-align: center; font-size: 35px">{{$levels->count()}}
    </p>
  </a>

  <a href="{{route('admin.groups')}}" class="card mb-3"
    style="width: 7rem; display: block; background-color: rgba(64, 144, 67, 0.6); box-shadow: 0px 4px 4px 0px rgba(255, 255, 255, 0.3) inset, 0px 4px 8px 0px rgba(0, 0, 0, 0.75); color: rgba(255, 255, 255, 1);">
    <div class="card-header" style="text-align: center; font-size: 16px">GROUPs</div>
    <hr style="color: aliceblue; margin: 0">
    <p class="card-text" style="text-align: center; font-size: 35px">{{$groups->count()}}
    </p>
  </a>

  <a href="{{route('admin.section')}}" class="card mb-3"
    style="width: 7rem; display: block; background-color: rgba(64, 144, 67, 0.6); box-shadow: 0px 4px 4px 0px rgba(255, 255, 255, 0.3) inset, 0px 4px 8px 0px rgba(0, 0, 0, 0.75); color: rgba(255, 255, 255, 1);">
    <div class="card-header" style="text-align: center; font-size: 16px">SECTIONs</div>
    <hr style="color: aliceblue; margin: 0">
    <p class="card-text" style="text-align: center; font-size: 35px">{{$sections->count()}}
    </p>
  </a>

</div>

<div style="display: flex; justify-content:space-around; flex-wrap:wrap; margin: 50px">

  <a href="{{route('admin.create.task')}}" class="card text-white mb-3"
    style="width: 7rem; display: block; background-color: rgba(47, 7, 7, 0.6); box-shadow: 0px 4px 4px 0px rgba(255, 255, 255, 0.3) inset, 0px 4px 8px 0px rgba(0, 0, 0, 0.75);">
    <div class="card-header" style="text-align: center; font-size: 16px">CREATE</div>
    <hr style="color: aliceblue; margin: 0">
    <p class="card-text" style="text-align: center; font-size: 35px; color:grey">TASK
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
        +
        <span class="visually-hidden">unread messages</span>
      </span>
    </p>
  </a>
  <a href="{{route('admin.create.rule')}}" class="card text-white mb-3"
    style="width: 7rem; display: block; background-color: rgba(47, 7, 7, 0.6); box-shadow: 0px 4px 4px 0px rgba(255, 255, 255, 0.3) inset, 0px 4px 8px 0px rgba(0, 0, 0, 0.75);">
    <div class="card-header" style="text-align: center; font-size: 16px">CREATE</div>
    <hr style="color: aliceblue; margin: 0">
    <p class="card-text" style="text-align: center; font-size: 35px; color:grey">RULE<span
        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
        +
        <span class="visually-hidden">unread messages</span>
    </p>
  </a>
  <a href="{{route('admin.create.levGrSec')}}" class="card text-white mb-3"
    style="width: 7rem; display: block; background-color: rgba(47, 7, 7, 0.6); box-shadow: 0px 4px 4px 0px rgba(255, 255, 255, 0.3) inset, 0px 4px 8px 0px rgba(0, 0, 0, 0.75);">
    <div class="card-header" style="text-align: center; font-size: 16px">CREATE</div>
    <hr style="color: aliceblue; margin: 0">
    <p class="card-text" style="text-align: center; font-size: 35px; color:grey">LCG<span
        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
        +
        <span class="visually-hidden">unread messages</span>
    </p>
  </a>


</div>

@endsection