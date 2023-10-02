@extends('index')

@section('content')
<main class="contain">
  
  <div class="row justify-content-center">
    <div class="  mt-5">
      <div class="card_log_registr">
        <div class="card-header mb-4">{{ __('Создать упражнение') }}</div>

        <div class="card-body">
           <form method="POST" action="{{ route('admin.store.task')}}">
              @csrf


              <div class="row mb-3">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">{{__('Выберете уровень сложности')}}</label>
                <select class="form-control mb-3" name="level_id" value="{{ old('level_id') }}">
                  <option hidden disabled selected > {{__("please select a level")}} </option>
                  @foreach ($levels as $item)
                    <option value="{{$item->id}}">
                      {{$item->id}}
                      {{$item->name_level}}
                    </option>
                  @endforeach                    
                </select>  

                @error("level_id")<p class="text-danger"> {{$message}}</p> @enderror               
              </div>


              <div class="row mb-3">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">{{__('Выберете группу для упражнения')}}</label>
                <select class="form-control mb-3" name="group_id" value="{{ old('group_id') }}">
                  <option hidden disabled selected > {{__("please select a group")}} </option>
                  @foreach ($groups as $item)
                    <option  value="{{$item->id}}">
                      {{$item->id}}
                      {{$item->desc_group}}
                    </option>
                  @endforeach                    
                </select>  
                @error("group_id")<p class="text-danger"> {{$message}}</p> @enderror               
              </div>

              <div class="row mb-3">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">{{__('Выберете секцию')}}</label>
                <select class="form-control mb-3" name="section_id" value="{{ old('section_id') }}">
                    <option hidden disabled selected > {{__("please select a section")}} </option>
                    @foreach ($sections as $item)
                      <option  value="{{$item->id}}">
                        {{$item->id}}
                        {{$item->name_section}}
                      </option>
                    @endforeach                    
                </select>  

                @error("section_id")<p class="text-danger"> {{$message}}</p> @enderror               
              </div>


              <div class="row mb-3">
                <label for="num_task" class="col-md-4 col-form-label text-md-end">{{ __('Num task') }}</label>

                <div class="col-md-6">
                  <input  type="number" step="1" id="num_task" type="integer" class="form-control" name="num_task"
                    value="{{ old('num_task') }}" autofocus> 

                  @error("num_task")<p class="text-danger"> {{$message}}</p> @enderror
                  
                </div>
              </div>
              

              <div class="row mb-3">
                <label for="task_text" class="col-md-4 col-form-label text-md-end">{{ __('Task text') }}</label>

                <div class="col-md-6">
                  <textarea id="task_text" type="text" class="form-control mb-3"  name="task_text"
                    value="{{ old('task_text') }}"></textarea>

                    @error("task_text")<p class="text-danger"> {{$message}}</p> @enderror
                </div>
              </div>


              <div class="row mb-3">
                <label for="rule_use" class="col-md-4 col-form-label text-md-end">{{ __('Правило') }}</label>

                <div class="col-md-6">
                  <input id="rule_use" type="text" class="form-control mb-3"  name="rule_use"
                    value="{{ old('rule_use') }}">

                    @error("rule_use")<p class="text-danger"> {{$message}}</p> @enderror
                </div>
              </div>


              <div class="row mb-3">
                <label for="correct_answer" class="col-md-4 col-form-label text-md-end">{{ __('Верное решение') }}</label>

                <div class="col-md-6">
                  <input id="correct_answer" type="text" class="form-control mb-3"  name="correct_answer"
                    value="{{ old('correct_answer') }}">

                    @error("correct_answer")<p class="text-danger"> {{$message}}</p> @enderror
                </div>
              </div>

              
              <div class="row mb-3">
                <label for="string_task" class="col-md-4 col-form-label text-md-end">{{ __('Строка задания') }}</label>

                <div class="col-md-6">
                  <input id="string_task" type="text" class="form-control mb-3"  name="string_task"
                    value="{{ old('string_task') }}">

                    @error("correct_answer")<p class="text-danger"> {{$message}}</p> @enderror
                </div>
              </div>


              <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn_reg_login">
                    {{ __('Создать') }}
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