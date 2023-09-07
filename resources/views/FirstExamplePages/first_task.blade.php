<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('asset/css/first_task.css')}}">
    <title>Первое задание RegExp</title>
</head>
<body>
    <header>
        <h1>Страница с первым заданием</h1>
    </header>
    <main>
        <div class="div_clue">
            <button class="button_clue">Подсказка</button>
            <p class="out_clue"></p>
        </div>
        <div class="task_1">
            <h2>Задания первого уровня:</h2>
            <p>
                1.Дана строка: ahb acb aeb aaaab caeeb adcb axeb bbbba aba aca aea xxyxx abba adca abea. 
                Составтье выражение, которое найдет ahb, acb, aeb, aab, abb по шаблону: буква 'a', любой символ, буква 'b'.
            </p>
            <input type="text" class="input_task_1" placeholder="введите ответ">
            <br>
            <br>
            <button class ="button_task_1">Проверить 1-ое задание</button>
            <br>
            <p class="out_task_1"></p>
            <p>
                2.Дана строка: ahb acb aeb aaaab caeeb adcb axeb bbbba aba aca aea xxyxx abba adca abea. 
                Составтье выражение, которое найдет aaaa, abba, adca, abea, по шаблону: буква 'a', 2 любых символа, буква 'a'.
            </p>
            <input type="text" class="input_task_2" placeholder="введите ответ">
            <br>
            <br>
            <button class ="button_task_2">Проверить 2-ое задание</button>
            <br>
            <p class="out_task_2"></p>
            <p>
                3.Дана строка: ahb acb aeb aaaab caeeb adcb axeb bbbba aba aca aea xxyxx abba adca abea. 
                Составтье выражение, которое найдет abba и abea, не захватив adca.
            </p>
            <input type="text" class="input_task_3" placeholder="введите ответ">
            <br>
            <br>
            <button class ="button_task_3">Проверить 3-ое задание</button>
            <br>
            <p class="out_task_3"></p>
        </div>
        
        <a href="{{route('/')}}">Вернуться на главную страницу</a>
    </main>
    <footer></footer>
    <script src="{{asset('asset/js/first_task_example.js')}}"></script>
</body>
</html>