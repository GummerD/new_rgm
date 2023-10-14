@extends('index')

@section('title')

@endsection

@section('content')

<main class="contain">

  <h3 class="profile_username">{{Auth::user()->login}}</h3>


  <div class="profile_content">
    <div class="profile_content_user">
      @if(is_numeric(Auth::user()->profile->path_img))
      <div class="profile_avatar"><img class="profile_avatar_img" src="{{ asset('asset/Images/photos/fone-125.jpg') }}"
          alt=""></div>
      @else
      <div class="profile_avatar"><img class="profile_avatar_img" src="{{asset(Auth::user()->profile->path_img)}}"
          alt=""></div>
      @endif
      <a href="{{route('profiles.update', ['user' => Auth::user()->id])}}">
        <button class="btn_profile_redact">{{__('Редактировать профиль')}}</button>
      </a>
    </div>

    <div class="profile_content_rating">
      @if(Auth::user()->profile->user_status === 'blocked')

      <div class="blocked_user_profile" style="max-width:500px; color: rgb(255, 84, 84);">
        <p style="font-size: 16px;"> {{__('Ваш аккаунт заблокирован! :(')}}</p>
        <p>
          {{__('К сожалению, Вы не можете продолжать занятия так как доступ к ним приостановлен
          Вы можете получить более подробную информацию, обратившись к нашим администраторам
          admin@mail.com.')}}
        </p>
      </div>

      @endif

      <li>rating: {{Auth::user()->profile->rating}}</li>
      <li>correct_answer: {{Auth::user()->profile->correct_answer}}</li>
      <li>incorrect_answer: {{Auth::user()->profile->incorrect_answer}}</li>
      <li>num_trainings: {{Auth::user()->profile->num_trainings}}</li>
      <li>progress: {{Auth::user()->profile->progress}}</li>
    </div>


    <div>
      <table cellspacing="0" cellpadding="0" summary="Rating Users">
        <tr>
          <th scope="col"><span class="auraltext">Users</span> </th>
          <th scope="col"><span class="auraltext">Current Rating</span> </th>
        </tr>

        @foreach ($user as $item)
        <tr>
          <td class="first" @if(Auth::user()->id == $item->id ) style="color:tomato;font-size: 16px;font-weight:bold"
            @endif>
            {{$item->login}}&nbsp;</td>
          <td class="value first">
            <img @if(Auth::user()->id == $item->id) src="{{ asset('asset/Images/Icons/bar_red.png') }}" @else src="{{
            asset('asset/Images/Icons/bar_blue.png') }}" @endif alt="" width="{{$item->profile->pixel_rating}}"
            height="16" />&nbsp;{{$item->profile->rating}}
          </td>
        </tr>
        @endforeach

      </table>
    </div>

  </div>
</main>
@endsection