<div class="header gradient_header">
  <div class="fon_black">
    <div class="contain_header">

      <a href="{{route('start')}}">
        <div class="logo logo_sm">RegExp</div>
      </a>
      <a href="{{route('rules')}}">Посмотреть правила</a>
      <a href="{{route('tasks')}}">К заданиям</a>

      @guest

      <div>
        @if (Route::has('login'))
        <div class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </div>
        @endif

        @if (Route::has('register'))
        <div class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </div>
        @endif

        @else
        <div class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            <img src="{{asset(" asset/Images")}}">
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
      </div>
    </div>
  </div>