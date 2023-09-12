@extends('index')

@section('title')

@endsection

@section('content')

<main class="container">

  <div class="text_field_light">
    <div style="margin-top: 15px" class="text_rules">
      <h2>Что такое регулярныне выражения</h2>
      <p style="font-size: 18px">
        Регулярное выражение – способ записи текстовых шаблонов. По
        сути, это обычная текстовая строка написанная на специальном
        языке, но она не содержит
        конкретный набор символов, а задаёт общие правила. Например,
        такие:
        строка из 3 символов, первый символ a.
      </p>
      <p style="font-size: 18px">
        Структура регулярного выражения выглядит следующим образом:
        строка которая всегда начинается с символа разделителя,
        за ним следует шаблон регулярного выражения,
        затем еще один символ разделителя и, наконец, необязятельный список модификаторов.
      </p>
      <p style="font-size: 18px">
        Простой пример визульного представления рег. выражения: /[a-b^w]/
      </p>
    </div>
    <div class="ref-info">

      <h2> Основные правилa языка регулярных выражений:</h2>
      <table class="table table-bordered">
        <tr>
          <th style="font-size: 20px">Выражение</th>
          <th style="font-size: 20px">Описание</th>
        </tr>
        @foreach ($rules as $rule)
        <tr>
          <td style="font-weight:lighter;font-size:22px;color:blue">{{ $rule->regex }}</td>
          <td style="font-size: 18px;font-style:italic">{{ $rule->description }}</td>
        </tr>
        @endforeach
      </table>

    </div>
  </div>


</main>

@endsection