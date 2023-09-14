@extends('index')

@section('title')
    {{ __('RegExp Упражнения') }}
@endsection

@section('content')
    <main>
        <h1>Начальный уровень сложности</h1>
        <h2>Метасимволы</h2>
        <p>
          Метасимволы - это символы, которые задают команды, а также управляющие 
          последовательности. Задания этого уровня будут направлены на использования именно их.
        </p>

        <p>Ниже представлены задания на правила:</p>
        <ul>
          <li>любой символ из последовательности, указанной в скобках [...] </li>
          <li>любой символ из последовательности, не указанной (исключающей этот символ/ы из поиска ) в скобках [^...]:</li>
        </ul>
        

        <div class="task_1">
            <h2>Задания:</h2>
            @for ($i = 0; $i <= 3; $i++)
                <p>{{$i+1}}. {!! $tasks[$i]->task_text !!}</p>
                <input type="text" class="input_task_{{ $i }}" placeholder="введите ответ">
                <button class="button_task_{{ $i }}">Проверить задание</button>
                <br>
                <p class="out_task_{{ $i }}"></p>

                {{-- Невидимые блоки для передачи в js значений переменных из модели Task --}}
                <p class="correct_answer_{{ $i }}" style="display: none">{{ $tasks[$i]->correct_answer }}</p>
                <p class="rule_use_{{ $i }}" style="display: none">{{ $tasks[$i]->rule_use }}</p>
                <p class="string_task_{{ $i }}" style="display: none">{{ $tasks[$i]->string_task }}</p>
                {{-- --------------------------------------------------------------------- --}}
            @endfor
        </div>

        <div class="div_clue">
            <button class="button_clue">Подсказка</button>
            <p class="out_clue"></p>
        </div>
    </main>

<script src="{{ asset('asset/js/first_task.js') }}"></script>
@endsection

