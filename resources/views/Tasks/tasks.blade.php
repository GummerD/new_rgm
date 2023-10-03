@extends('index')

@section('title')
{{ __('RegExp Упражнения') }}
@endsection

@section('content')

<main class="contain">

  <div class="tasks_begin_txt">

    <div class="tasks_level_txt">{{ $level_view->implode('name_level') }}</div>

    <div class="tasks_section_txt">{{ $section_view->implode('name_section') }}</div>

  </div>

  <div class="tasks_content">
    <div class="flip">
      <div class="nutro">

        <div class="group_tasks">

          <div class="num_group_txt">Задания {{ $group_view->implode('num_group') }}</div>

          <div class="tasks">

            @foreach ($tasks_view as $item)
            <hr>
            <p class="tsk_txt">{{ $item->num_task }}. {!! $item->task_text !!}</p>
            <div class="knop">
              <input type="text" class="input_task" placeholder="введите ответ">
              <button class="b_t button_task_{{ $item->num_task - 1 }}">Проверить</button>
            </div>
            <br>
            {{-- Блок вывод подсказок, по нему нужны стили --}}
            <p class="out_task_{{ $item->num_task - 1 }}"></p>
            <button class="clue_{{ $item->num_task - 1 }}" style="visibility:hidden">Нужна подсказка?</button>
            <h4 class="h4_clue_{{ $item->num_task - 1 }}" style="visibility:hidden">Варианты ответов:</h3>
            <p class="out_clue_{{ $item->num_task - 1 }}" style="visibility:hidden"></p>
            {{-- --------------------------------------------------------------------- --}}

            {{-- Невидимые блоки для передачи в js значений переменных из модели Task по ним не нужны стили, они места
            не
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

          <p class="about_section">{{ $section_view->implode('desc_section') }}</p>

          <p class="about_group">{{ $group_view->implode('desc_group') }}</p>

          <div class="ab_but">
            <div class="div_clue">
              <button class="button_clue" onclick="flip()">Памятка</button>
              {{-- <p class="out_clue"></p> --}}
            </div>


            <a class="a_dalee" href="{{ route(
              'profiles.saveprogress', 
              Request::segment(2) . ',' . 
              Request::segment(3) . ',' . 
              Request::segment(4)) }}">
              <button class="dalee">
                Далее
                <img class="icon_task_dalee" src="{{asset('asset/Images/Icons/icons8-arrow-48.png')}}">
              </button>
            </a>

          </div>

        </div>
      
      </div>
      <div class="nutro-back">
        <table class="tab">
          <tr class="tab_tr">
            <th class="tab_th">Выражение</th>
            <th class="tab_th">Описание</th>
          </tr>
          @foreach ($helps as $rule)
          <tr>
            <td class="tab_rule_regex">{{ $rule->regex }}</td>
            <td class="tab_rule_desc">{{ $rule->description }}</td>
          </tr>
          @endforeach
        </table>
        <button style="float: right" class="button_clue" onclick="flip()">Назад</button>
      </div>
    </div>
  </div>

</main>

<script src="{{ asset('asset/js/reload_task.js') }}"></script>
<script src="{{ asset('asset/js/first_task_example.js') }}"></script>
<script src="{{ asset('asset/js/flip.js') }}"></script>
@endsection