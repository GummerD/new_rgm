@extends('index')

@section('title')
@endsection

@section('content')

<main class="contain">

  <div class="profile_content">
     
        
    <div class="profile_content_user">
      <h3 class="profile_username_smoll">{{Auth::user()->login}}</h3>
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
      
    <h3 class="profile_username">{{Auth::user()->login}}</h3>

      @if(Auth::user()->profile->user_status === 'blocked')

        <div class="blocked_user_profile">
          <p style="font-size: 16px;"> {{__('Ваш аккаунт заблокирован! :(')}}</p>
          <p class="blocked_user_profile_text">
            {{__('К сожалению, Вы не можете продолжать занятия так как доступ к ним приостановлен
            Вы можете получить более подробную информацию, обратившись к нашим администраторам
          ')}} <span class="blocked_user_profile_email"> admin@mail.com.</span>
          </p>
        </div>

      @endif

      @if(Auth::user()->profile->user_status !== 'blocked')

        @if(Auth::user()->profile->rating  < 80 && Auth::user()->profile->rating > 0)
          <p class="profile_rating_message"> 
            {{__('Ваш рейтинг - ')}} {{Auth::user()->profile->rating}} {{__('пунктов')}}
            <br/> {{'Тяжело в учении - легко в бою!'}}
          </p>
        @endif

        @if (Auth::user()->profile->rating >= 80 && Auth::user()->profile->rating < 580)
          <p class="profile_rating_message">{{__('Вы успешный ученик!')}}
            <br/> {{__('Ваш рейтинг - ')}} {{Auth::user()->profile->rating}} {{__('пунктов.')}}
          </p>          
        @endif

        @if (Auth::user()->profile->rating >= 580  && Auth::user()->profile->rating < 1500)
          <p class="profile_rating_message"> {{__('Вы справляетесь на отлично!')}}
            <br/> {{__('Ваш рейтинг -')}} {{Auth::user()->profile->rating}} {{__('пунктов.')}}
          </p>          
        @endif

        @if(Auth::user()->profile->rating >= 1500)
          <p class="profile_rating_message"> {{__('Скоро Вы станете гуру регулярных выражений!')}}
            <br/> {{__('Ваш рейтинг -')}} {{Auth::user()->profile->rating}} {{__('пунктов.')}}
          </p>          
        @endif

        @if(Auth::user()->profile->rating <= 0)
          <p class="profile_rating_message"> {{__('Ваш рейтинг -')}} {{Auth::user()->profile->rating}} {{__('пунктов')}}
            <br/> {{'Не огорчайтесь, занимайтесь больше и все получится :)'}}
          </p>
        @endif
             

      <ul class ="profile_list">
        <li>{{__('Колличество выполненных заданий: ')}}  {{Auth::user()->profile->num_trainings}}</li>
        <li>{{__('Колличество верных ответов: ')}} {{Auth::user()->profile->correct_answer}}</li>
        <li>{{__('Колличество не верных ответов: ')}} {{Auth::user()->profile->incorrect_answer}}</li>
        <li>{{__('Вы остановились на задании -')}} {{Auth::user()->profile->progress}}</li>
      </ul>

    @endif

    <div class="profile_list_email">{{__('Моя почта:')}} {{Auth::user()->email}}</div>
    <button class="profile_training"><a href="{{route('training')}}" style="width: 100%; height: 100%">{{__('Потренироваться  :)')}}</a></button>
    </div>
    
  </div>




  <div class = "profile_grafik">
      <p class="profile_grafik_title">{{__('Рейтинг среди других учеников')}}</p>
      <table cellspacing="0" cellpadding="0" summary="Rating Users">
        <tr class="profile_grafik_colum_title">
          <th scope="col"><span class="auraltext"></span> </th>
          <th scope="col"><span class="auraltext">{{__('Логин')}}</span> </th>
          <th scope="col"><span class="auraltext">{{__('Текущий рейтинг')}}</span> </th>
        </tr>



        @foreach ($user as $item)
        <tr class="profile_grafik_colum">
          <td class="first" @if(Auth::user()->id == $item->id ) 
          style="color:tomato;font-size:16px;"@endif>
            <span class="profile_grafik_rating_you">{{$counter++}}</span>
            &nbsp;
          </td>
          <td class="first" @if(Auth::user()->id == $item->id ) 
            style="color:tomato;font-size: 16px;font-weight:bold" @endif>
            <span class="profile_grafik_rating_you">{{$item->login}}</span>
            &nbsp;
          </td>
          <td class="value first">
            <img @if(Auth::user()->id == $item->id) src="{{ asset('asset/Images/Icons/bar_red.png') }}" @else src="{{
            asset('asset/Images/Icons/bar_blue.png') }}" @endif alt="" width="{{$item->profile->pixel_rating}}"
            height="16" />&nbsp;{{$item->profile->rating}}
          </td>
        </tr>
        @endforeach

      </table>
      <div class="pagination_grafik">{{ $user->links() }}</div>

    </div>

  </div>
</main>
@endsection