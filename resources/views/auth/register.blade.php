@extends('index')

@section('content')
<main class="contain">
  
  <div class="row justify-content-center reg_log_content">
    <div class=" mt-5  reg_log_content_card">
      <div class="card_log_registr">
        <div class="card-header mb-4">{{ __('Register') }}</div>
        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row mb-3">
              <label for="login" class="col-md-3 col-form-label text-md-end">{{ __('Login') }}</label>
               <div class="col-md-6">
                <input id="login" type="text" class="inpt_reg_login @error('login') is-invalid @enderror" name="login"
                  value="{{ old('login') }}" required autocomplete="login" autofocus>

                @error('login')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

             <div class="row mb-3">
              <label for="email" class="col-md-3 col-form-label text-md-end">{{ __('Email Address') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="inpt_reg_login @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                 </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="password" class="col-md-3 col-form-label text-md-end">{{ __('Password') }}</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="inpt_reg_login @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="password-confirm" class="col-md-3 col-form-label text-md-end">{{ __('Confirm Password')
                  }}</label>

                <div class="col-md-6">
                  <input id="password-confirm" type="password" class="inpt_reg_login" name="password_confirmation"
                    required autocomplete="new-password">
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn_reg_login">
                    {{ __('Register') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
 
</main>
@endsection