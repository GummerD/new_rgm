@extends('index')

@section('title')
{{ __('RegExp Упражнения') }}
@endsection

@section('content')

<main class="contain">

  <div class="tasks_begin_txt">

    @foreach ($lev as $item)
    <div class="tasks_level_txt">{{ $item->name_level }}</div>
    @endforeach

    @foreach ($sect as $item)
    <div class="tasks_section_txt">{{ $item->name_section }}
    </div>
    @endforeach

  </div>

  <div class="tasks_content">
    <div class="nutro">

      <div class="group_tasks">

        @foreach ($gr as $item)
        <div class="num_group_txt">Задания {{ $item->num_group }}</div>
        @endforeach

        <div class="tasks">

          @foreach ($tsk as $item)
          <p>{{ $item->num_task }}. {!! $item->task_text !!}</p>
          <div class="knop">
            <input type="text" class="input_task" placeholder="введите ответ">
            <button class="b_t button_task_{{ $item->num_task - 1 }}">Проверить</button>
          </div>
          <br>
          {{-- Блок вывод подсказок, по нему нужны стили --}}
          <p class="out_task_{{ $item->num_task - 1 }}"></p>
          <button class="clue_{{ $item->num_task - 1 }}" style="display: none">Нужна подсказка?</button>
          <p class="out_clue_{{ $item->num_task - 1 }}" style="display: none"></p>
          {{-- --------------------------------------------------------------------- --}}

          {{-- Невидимые блоки для передачи в js значений переменных из модели Task по ним не нужны стили, они места не
          занимают --}}
          <p class="correct_answer_{{ $item->num_task - 1 }}" style="display: none">{{ $item->correct_answer }}</p>
          <p class="rule_use_{{ $item->num_task - 1 }}" style="display: none">{{ $item->rule_use }}</p>
          <p class="string_task_{{ $item->num_task - 1 }}" style="display: none">{{ $item->string_task }}</p>
          {{-- --------------------------------------------------------------------- --}}
          {{-- <div class="" style="display: none">{{$level = $item->level_id}}</div> --}}
          @endforeach
        </div>

      </div>

      <div class="about_tasks">
        @foreach ($sect as $item)
        <p class="about_section">{{ $item->desc_section }}</p>
        @endforeach

        @foreach ($gr as $item)
        <p class="about_group">{{ $item->desc_group }}</p>
        @endforeach

        <div class="ab_but">
          <div class="div_clue">
            <button class="button_clue">Памятка</button>
            <p class="out_clue"></p>
          </div>

          @foreach ($gr as $item)
          <a href={{ $item->num_group +1 }}><button class="dalee">Далее <img class="icon_task_dalee" src="{{asset('asset/Images/Icons/icons8-arrow-48.png')}}"></button></a>
          @endforeach
        </div>

      </div>

    </div>
  </div>

</main>

<script src="{{ asset('asset/js/reload_task.js') }}"></script>
<script src="{{ asset('asset/js/first_task_example.js') }}"></script>
@endsection