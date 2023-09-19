@extends('index')

@section('title')
{{ __('RegExp Упражнения') }}
@endsection

@section('content')

<main class="contain">

  <h3>Задания:</h3>

  <div class="rules_content">
    @foreach ($lev as $item)
    <h1>{{ $item->name_level }}</h1>
    @endforeach
    <hr>
    @foreach ($sect as $item)
    <h2>{{ $item->name_section }}</h2>
    <p>{{ $item->desc_section }}</p>
    @endforeach
    <hr>
    @foreach ($gr as $item)
    <h2>Задания {{ $item->num_group }}</h2>
    <p>{{ $item->desc_group }}</p>
    @endforeach

    <div class="task_1">

      {{-- <div class="" style="display: none">{{$level = 0}}</div> --}}
      @foreach ($tsk as $item)
      <p>{{ $item->num_task }}. {!! $item->task_text !!}</p>
      <input type="text" class="input_task" placeholder="введите ответ">
      <button class="button_task_{{ $item->num_task - 1 }}">Проверить задание</button>
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


    <div class="div_clue">
      <button class="button_clue">Памятка основных правил</button>
      <p class="out_clue"></p>
    </div>
    @foreach ($gr as $item)
    <a href={{ $item->num_group +1 }}><button>Новый уровень</button></a>
    @endforeach
</main>
</div>

<script src="{{ asset('asset/js/reload_task.js') }}"></script>
<script src="{{ asset('asset/js/first_task_example.js') }}"></script>
@endsection