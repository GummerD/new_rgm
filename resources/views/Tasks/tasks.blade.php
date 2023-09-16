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

            <div class="" style="display: none">{{$level = 0}}</div>
            @foreach ($tasks as $item)
                <p>{{ $item->num_task }}. {!! $item->task_text !!}</p>
                <input type="text" class="input_task" placeholder="введите ответ">
                <button class="button_task_{{ $item->num_task - 1 }}">Проверить задание</button>
                <br>
                {{-- Блок вывод подсказок, по нему нужны стили --}}
                <p class="out_task_{{ $item->num_task - 1 }}"></p>
                <button class="clue_{{ $item->num_task - 1 }}" style="display: none">Нужна подсказка?</button>
                <p class="out_clue_{{ $item->num_task - 1 }}" style="display: none"></p>
                {{-- --------------------------------------------------------------------- --}}

                {{-- Невидимые блоки для передачи в js значений переменных из модели Task по ним не нужны стили, они места не занимают --}}
                <p class="correct_answer_{{ $item->num_task - 1 }}" style="display: none">{{ $item->correct_answer }}</p>
                <p class="rule_use_{{ $item->num_task - 1 }}" style="display: none">{{ $item->rule_use }}</p>
                <p class="string_task_{{ $item->num_task - 1 }}" style="display: none">{{ $item->string_task }}</p>
                {{-- --------------------------------------------------------------------- --}}
                <div class="" style="display: none">{{$level = $item->level_id}}</div>
            @endforeach
        </div>

        {{ $tasks->links('pagination::bootstrap-4') }}
        

        <div class="div_clue">
            <button class="button_clue">Памятка основных правил</button>
            <p class="out_clue"></p>
        </div>
        <a href="{{ route('tasks', [$level + 1]) }}"><button>Новый уровень</button></a>
    </main>

    <script src="{{ asset('asset/js/reload_task.js') }}"></script>
    <script src="{{ asset('asset/js/first_task_example.js') }}"></script>
@endsection
