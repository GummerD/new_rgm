@extends('index')

@section('title')

@endsection

@section('content')

<main class="contain">

  <h3 class='rules_title' style="font-weight:bold">Правила:</h3>

  <div class="rules_content">
    <div class="text_rules">
      <h4>Что такое регулярныне выражения</h4>
      <p style="font-size: 14px">
        Регулярное выражение – способ записи текстовых шаблонов. По
        сути, это обычная текстовая строка написанная на специальном
        языке, но она не содержит
        конкретный набор символов, а задаёт общие правила. Например,
        такие:
        строка из 3 символов, первый символ a.
      </p>
      <p style="font-size: 14px">
        Структура регулярного выражения выглядит следующим образом:
        строка которая всегда начинается с символа разделителя,
        за ним следует шаблон регулярного выражения,
        затем еще один символ разделителя и, наконец, необязятельный список модификаторов.
      </p>
      <p style="font-size: 16px">
        Простой пример визульного представления рег. выражения: /[a-b^w]/
      </p>
    </div>
    <div class="ref-info">

      <h4> Основные правилa языка регулярных выражений:</h4>
      <table class="table">
        <tr class="">
          <th class="rules_table_th" style="font-size: 18px">Выражение</th>
          <th style="font-size: 18px">Описание</th>
        </tr>
        @foreach ($rules as $rule)
        <tr>
          <td class='table_rule_regex rules_table_th'>{{ $rule->regex }}</td>
          <td class="" style="font-size: 16px;font-style:italic">{{ $rule->description }}</td>
        </tr>
        @endforeach
      </table>

    </div>
  </div>


</main>

@endsection