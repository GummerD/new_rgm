<div class="header gradient_header">
  <div class="fon_black">


    <div class="contain_header">

      <a href="{{route('start')}}">
        <div class="logo_sm">
          <div class="logo_sm_regexp">RegExp</div>
          <div class="logo_sm_master">master</div>
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
            <a href="{{route('profiles')}}">{{__('Личный кабинет')}}</a>

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
        <a href="tasks/{{Auth::user()->profile->progress}}">
          @else
          <a href="{{ route('login') }}">
            @endif
            <img class=" icon_header" src="{{asset('asset/Images/Icons/icons1.png')}}">
          </a>


      </div>

    </div>

  </div>
</div>