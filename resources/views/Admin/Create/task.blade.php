@extends('index')

@section('content')
<main class="contain">
  
  <div class="row justify-content-center">
   
      <div class="card_log_registr mt-4 overflow">
        <div class="card-header mb-4">{{ __('Создать упражнение') }}</div>

        <div class="" style="display: flex; justify-content: center">
           <form method="POST" action="{{ route('admin.store.task')}}" style="max-width:730px;">
              @csrf
              <div class="mb-2 justify-content-center">
                <label  class="col-md-8 col-form-label text-md-start">{{__('Уровень сложности')}}</label>
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


              <div class="mb-2">
                <label  class="col-md-8 col-form-label text-md-start">{{__('Группа упражнений')}}</label>
                <select class="form-control mb-3" name="group_id" value="{{ old('group_id') }}">
                  <option hidden disabled selected > {{__("please select a group")}} </option>
                  @foreach ($groups as $item)
                  <div class="" style="max-width: 630px; word-break:break-all">
                    <option  value="{{$item->id}}">
                      {{$item->id}}
                      {{$item->desc_group}}
                    </option>
                  </div>                  
                  @endforeach                    
                </select>  
                @error("group_id")<p class="text-danger"> {{$message}}</p> @enderror               
              </div>

              <div class="mb-2">
                <label  class="col-md-8 col-form-label text-md-start">{{__('Секция')}}</label>
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


              <div class="mb-2 col-md-4">
                <label for="num_task" class="col-md-8 col-form-label text-md-start">{{ __('Номер задачи') }}</label>
                  <input  type="number" step="1" id="num_task" type="integer" class="form-control col-md-2" name="num_task"
                    value="{{ old('num_task') }}" autofocus> 

               </div>
               @error("num_task")<p class="text-danger"> {{$message}}</p> @enderror

              <div class="mb-2">
                <label for="task_text" class="col-md-4 col-form-label text-md-start">{{ __('Текст задачи') }}</label>

                  <textarea id="task_text" type="text" class="form-control mb-3"  name="task_text"
                    value="{{ old('task_text') }}"></textarea>

                @error("task_text")<p class="text-danger"> {{$message}}</p> @enderror
              </div>


              <div class="mb-2">
                <label for="rule_use" class="col-md-4 col-form-label text-md-start">{{ __('Правило') }}</label>

                  <input id="rule_use" type="text" class="form-control mb-3"  name="rule_use"
                    value="{{ old('rule_use') }}">

                @error("rule_use")<p class="text-danger"> {{$message}}</p> @enderror
              </div>


              <div class="mb-2">
                <label for="correct_answer" class="col-md-4 col-form-label text-md-start">{{ __('Верное решение') }}</label>

                <input id="correct_answer" type="text" class="form-control mb-3"  name="correct_answer"
                  value="{{ old('correct_answer') }}">

                @error("correct_answer")<p class="text-danger"> {{$message}}</p> @enderror
              </div>

              
              <div class="mb-2">
                <label for="string_task" class="col-md-4 col-form-label text-md-start">{{ __('Строка задания') }}</label>

                  <input id="string_task" type="text" class="form-control mb-3"  name="string_task"
                    value="{{ old('string_task') }}">

                    @error("correct_answer")<p class="text-danger"> {{$message}}</p> @enderror
              </div>


            
                <div class="col-md-6 mt-5">
                  <button type="submit" class="btn_reg_login">
                    {{ __('Создать') }}
                  </button>
                </div>
           
            </form>
          </div>
        </div>
    
    </div>
    <a class ="admin_page_back_btn" href="{{route('admin')}}">{{__('Обратно')}}</a>
</main>
@endsection