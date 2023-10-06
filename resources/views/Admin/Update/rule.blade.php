@extends('index')

@section('content')
<main class="contain">   
  
  <div class="row justify-content-center">
   
      <div class="card_log_registr mt-4" style="overflow: auto; height:70vh">
        <div class="card-header mb-4">{{ __('Изменить правило') }}</div>

        <div class="" style="display: flex; justify-content: center">
           <form method="POST" action="{{ route('admin.update.rule', $rule)}}" style="width:40vw">
              @csrf          


              <div class="mb-2 ">
                <label for="num_rule" class="col-md-4 col-form-label text-md-start">{{ __('Номер правила') }}</label>
                  <input  type="number" step="1" id="num_rule" type="integer" class="form-control" name="num_rule"
                    value="{{$rule->num_rule}}" autofocus> 

                  @error("num_rule")<p class="text-danger"> {{$message}}</p> @enderror
              </div>
              

              <div class="mb-2">
                <label for="regex" class="col-md-4 col-form-label text-md-start">{{ __('Выражение') }}</label>

                  <input id="regex" type="text" class="form-control mb-3"  name="regex" style="max-width:860px"
                    value="{{ $rule->regex }}">

                @error("regex")<p class="text-danger"> {{$message}}</p> @enderror
              </div>


              <div class="mb-2">
                <label for="description" class="col-md-4 col-form-label text-md-start">{{ __('Описание правила') }}</label>

                  <textarea id="description" type="text" class="form-control mb-3"  name="description"
                    value="{{ $rule->description }}">{{ $rule->description }}</textarea>

                @error("description")<p class="text-danger"> {{$message}}</p> @enderror
              </div>


                <div class="col-md-6 mt-5">
                  <button type="submit" class="btn_reg_login">
                    {{ __('Изменить') }}
                  </button>
                </div>
           
            </form>
          </div>
        </div>
    
    </div>
 
</main>
@endsection