<div class="header gradient_header">
  <div class="fon_black">


    <div class="contain_header">

      <a href="{{route('start')}}">
        <div>
          <img class="logo_sm" src="{{asset('asset/Images/Icons/logo.png')}}" alt="">
        </div>
      </a>

      <div class="icon_block_header">
        @guest
        <div class="register_login_comp">
          @if (Route::has('login'))
          <div class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">
              <button class="log_component">{{ __('Login') }}</button>
            </a>
          </div>
          @endif

          @if (Route::has('register'))
          <div class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">
              <button class="register_component">{{ __('Register') }}</button>
            </a>
          </div>
          @endif
        </div>



        @else
        <div class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            <img class="icon_header" src="{{asset('asset/Images/Icons/icons8-user.png')}}">
          </a>

          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <p> {{ Auth::user()->login }}</p>
            <a class="dropdown-item" href="{{route('profiles')}}">{{__('Личный кабинет')}}</a>

            @if ((Auth::user()->profile->user_status) === "admin")

            <a class="dropdown-item" href="{{route('admin')}}">{{__('Кабинет администратора')}}</a>

            @endif

            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
              {{ __('Выйти') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>


          </div>
        </div>

        @endguest


        <a href="{{route('rules')}}">
          <img class="icon_header " src="{{asset('asset/Images/Icons/icons8-book-64.png')}}">
        </a>


        @if (Auth::user())

        @if (Route::currentRouteName()=='profiles')
        <a href="tasks/{{Auth::user()->profile->progress}}">
          @elseif (Route::currentRouteName()=='tasks')
          <a href="{{ route('tasks', [
            'level' => $level_view->value('num_level'),
            'section' => $section_view->value('num_section'),
            'group' => $group_view->value('num_group'),
            ]) }}">
            @elseif (Route::currentRouteName()=='rules')
            <a href="tasks/{{Auth::user()->profile->progress}}">
              @elseif (Route::currentRouteName()=='admin')
              <a href="tasks/{{Auth::user()->profile->progress}}">
                @elseif (Request::path()=='admin/level')
                <a href="/tasks/{{Auth::user()->profile->progress}}">
                  @elseif (Request::path()=='admin/tasks')
                  <a href="/tasks/{{Auth::user()->profile->progress}}">
                    @elseif (Request::path()=='admin/rules')
                    <a href="/tasks/{{Auth::user()->profile->progress}}">
                      @elseif (Request::path()=='admin/group')
                      <a href="/tasks/{{Auth::user()->profile->progress}}">
                        @elseif (Request::path()=='admin/section')
                        <a href="/tasks/{{Auth::user()->profile->progress}}">
                          @elseif (Request::path()=='admin/create/task')
                          <a href="/tasks/{{Auth::user()->profile->progress}}">
                            @elseif (Request::path()=='admin/create/rule')
                            <a href="/tasks/{{Auth::user()->profile->progress}}">
                              @elseif (Request::path()=='admin/create/levGrSec')
                              <a href="/tasks/{{Auth::user()->profile->progress}}">
                                @endif

                                @else
                                <a href="{{ route('login') }}">
                                  @endif
                                  <img class=" icon_header" src="{{asset('asset/Images/Icons/icons1.png')}}">
                                </a>


      </div>

    </div>

  </div>
</div>