@extends('index')

@section('content')
<main class="contain">
  
  <div class="row justify-content-center">
   
      <div class="card_log_registr mt-4" style="overflow: auto; height:70vh">
        <div class="card-header mb-4">{{ __('Создать упражнение') }}</div>

        <div class="" style="display: flex; justify-content: center">
           <form method="POST" action="{{ route('admin.update.task', ['task'=>$task])}}" style="max-width:730px;">
              @csrf
              <div class="mb-2 justify-content-center">
                <label  class="col-md-8 col-form-label text-md-start">{{__('Выберете уровень сложности')}}</label>
                <select class="form-control mb-3" name="level_id" value="{{ $task->level_id }}">
                  <option hidden disabled selected > {{ $task->level_id }}  {{$task->level->name_level}}  </option>
                  @foreach ($levels as $item)
                    <option value="{{$task->id}}">
                      {{$item->id}}
                      {{$item->name_level}}
                    </option>
                  @endforeach                    
                </select>  

                @error("level_id")<p class="text-danger"> {{$message}}</p> @enderror               
              </div>


              <div class="mb-2">
                <label  class="col-md-8 col-form-label text-md-start">{{__('Выберете группу для упражнения')}}</label>
                <select class="form-control mb-3" name="group_id" value="{{ $task->group_id }}">
                  <option hidden disabled selected > {{ $task->group_id }}  {{$task->group->desc_group}} </option>
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
                <label  class="col-md-8 col-form-label text-md-start">{{__('Выберете секцию')}}</label>
                <select class="form-control mb-3" name="section_id" value="{{ $task->section_id }}">
                    <option hidden disabled selected > {{ $task->section_id }}  {{$task->section->name_section}} </option>
                    @foreach ($sections as $item)
                      <option  value="{{$item->id}}">
                        {{$item->id}}
                        {{$item->name_section}}
                      </option>
                    @endforeach                    
                </select>  

                @error("section_id")<p class="text-danger"> {{$message}}</p> @enderror               
              </div>


              <div class="mb-2 col-md-2">
                <label for="num_task" class="col-md-8 col-form-label text-md-start">{{ __('Num task') }}</label>
                  <input  type="number" step="1" id="num_task" type="integer" class="form-control" name="num_task"
                    value="{{ $task->num_task }}" autofocus> 

                  @error("num_task")<p class="text-danger"> {{$message}}</p> @enderror
              </div>
              

              <div class="mb-2">
                <label for="task_text" class="col-md-4 col-form-label text-md-start">{{ __('Task text') }}</label>

                  <textarea id="task_text" type="text" class="form-control mb-3"  name="task_text"
                        value="{{ $task->task_text}}">{{$task->task_text}}</textarea>

                @error("task_text")<p class="text-danger"> {{$message}}</p> @enderror
              </div>


              <div class="mb-2">
                <label for="rule_use" class="col-md-4 col-form-label text-md-start">{{ __('Правило') }}</label>

                  <input id="rule_use" type="text" class="form-control mb-3"  name="rule_use"
                    value="{{ $task->rule_use }}">

                @error("rule_use")<p class="text-danger"> {{$message}}</p> @enderror
              </div>


              <div class="mb-2">
                <label for="correct_answer" class="col-md-4 col-form-label text-md-start">{{ __('Верное решение') }}</label>

                <input id="correct_answer" type="text" class="form-control mb-3"  name="correct_answer"
                  value="{{$task->correct_answer}}">

                @error("correct_answer")<p class="text-danger"> {{$message}}</p> @enderror
              </div>

              
              <div class="mb-2">
                <label for="string_task" class="col-md-4 col-form-label text-md-start">{{ __('Строка задания') }}</label>

                  <input id="string_task" type="text" class="form-control mb-3"  name="string_task"
                    value="{{ $task->string_task}}">

                    @error("correct_answer")<p class="text-danger"> {{$message}}</p> @enderror
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