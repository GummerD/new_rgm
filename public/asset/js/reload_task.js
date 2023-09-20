; (function () {
    /**
     * -----------------------------------------------------------------------------------------------------------------------------------------------
     * Здесь расположен логический блок страницы Tasks (задания).
     * 
     * Переменные:
     * let input_task - необходима для получения из input HTMLCollection, которая далее в цикле for определяет количество выводов ответа заданий и ответов.
     * let rul_array - необхожима для хранения рег. выражений из БД для дальнейшего сравнения с ответом пользовтеля.
     * let count_try_answer - необходима в функции output_result() для подсчета количества неправильных ответов пользователя, 
     * при значении (count_try_answer > 2) будет выведен подсказка.
     * let out_clue - необходима в цикле for для вывода на в задании подсказок .
     * let data - происходит присвоение введенных пользовтелей ответов.
     * let rule_use - происходит получение верных ответов из БД, далее они передаются в переменную - rull_array.
     * let newRegExp - данная переменная через встроенную функцию new RegExp(data, 'g') получает приобразованный ввденый пользовтелме ответ в рег. выражение.
     * let string_task - получате из БД проверяемую строку рег. выражением в переменной RegRxp.
     * let strOutPut - присваивает через функцию match() найденные подстроки согласно переменной - newRegExp (т.е. здесь и происходит основная работа рег. выражения).
     * let funny_unswer - массив с забавными репликами в случае неверного ответа пользовтеля.
     * let random_funny_unswer - необходима для получения рандомного индекса в массиве - funny_unswer.
     * let button_clue - присваевает в <button>, который появляется после 2-ого неверного ответа пользовтеля.
     * 
     * Функции:
     * function output_result(data, i, out_clue){} - выводит результат введенных пользовтелем данных, если все верно
     * то на экране будет выведно храниемое в переменной - data значение и найденая подстрока - strOutPut
     * function try_answer(out_clue){} - выводит забавные реплики при первых двух неверных ответах
     * function clue(i, out_clue) {} - на третий неправильный ответ логика предлагает воспользовться подсказкой через <button>
     * function empty_string( ) - проверка на пустую строку в теге input_task
     * ------------------------------------------------------------------------------------------------------------------------------------------------
     */

    let input_task = document.getElementsByClassName('input_task');
    input_task = Array.from(input_task);
    //console.log("проверка связи " + input_task);
    let rul_array = [];// переменная 
    //console.log('итоговый массив верных ответов после итераций' + rul_array)
    let count_try_answer = 0;

    //основной цикл перебора строки ввода ответов пользователя с последующим сопостовлением с верными ответами
    for (let i = 0; i < input_task.length; i++) {
        //console.log("проверка итераций" + i);
        let out_clue = document.querySelector(`.out_clue_${i}`);
        document.querySelector(`.button_task_${i}`).addEventListener('click', function () {
            
            let rule_use = document.querySelector(`.rule_use_${i}`).textContent;
            rul_array[i] = rule_use.split(', ');
            //console.log("массив верных ответов после добавления в него значения" + rul_array);

            let data = input_task[i].value;
            //console.log("введенные данные пользователем" + data);
            
            //проверка на пустую строку
            data == !' ' ?  empty_string(i) :  output_result(data, i, out_clue) ;

            //out_clue.style = 'display: none';
        })

    }

    // проверка на пустую строку
    function empty_string(i) {
        document.querySelector(`.out_task_${i}`).style = "color: violet";
        document.querySelector(`.out_task_${i}`).textContent = `
                Вы забыли вести регулярное выражение.
            `;
    }

    // функция с блоком ветления, в которую передается и сравнивается введеный ответ пользователя
    function output_result(data, i, out_clue) {
        if (data == rul_array[i][0]
            || data == rul_array[i][1]
            || data == rul_array[i][2]
            || data == rul_array[i][3]
        ) {
            out_clue.style = 'display: none';
            let newRegExp = new RegExp(data, 'g');
            //console.log('рег выражение' + newRegExp);
            let string_task = document.querySelector(`.string_task_${i}`).textContent;
            //console.log('проверяемая строка' + string_task);
            let strOutPut = string_task.match(newRegExp);
            strOutPut = strOutPut.join(', ');
            //console.log('результат поиска' + strOutPut);
            document.querySelector(`.out_task_${i}`).style = "color: green";
            document.querySelector(`.out_task_${i}`).textContent = `
                Ваш вариант регулярного выражения - /${data}/ верен, результат поиска: ${strOutPut}
            `;
        } else {

            count_try_answer++;

            out_clue.textContent = ``;

            /** 
             * тернарный оператор для вывода на странице верного ответа либо кнопки с подсказкой после 
             * после двух неверных ответов
            */
            count_try_answer > 2 ? (
                clue(i, out_clue),
                count_try_answer = 0,
                out_clue.textContent = ``
            )
                : try_answer(out_clue);

            document.querySelector(`.out_task_${i}`).style = "color: red";
            document.querySelector(`.out_task_${i}`).textContent = `
                Вы не верно подобрали регулярное выражение - /${data}/, попробуйте еще раз.
            `;
        }
    }

    // функция выводка забавных ответов в случае неверно введенного выражения пользовтелем:
    function try_answer(out_clue) {
        let random_funny_unswer = 0;
        let funny_unswer = [
            'Зачем ты так? подумай еще...',
            'Вероятно тебе стоит подучить правила?',
            'Ты же не сдашься, так ведь? Попробуй еще раз!',
            'Учение свет, а не учениe - чуть свет и на работу, попробуй еще!',
            'Ну-ну, не стоит спешить! Попробуй еще раз, у тебя все получится!',
            'Попробуй еще раз, дружок - пирожок :)'
        ];

        //console.log(out_clue);
        out_clue.style = 'display: inline';
        random_funny_unswer = Math.floor(Math.random() * (3 + 2))
        //console.log(random_funny_unswer);
        out_clue.textContent = `${funny_unswer[random_funny_unswer]}`;
    }

    // функция для вывода кнопки подсказки + подсказки:
    function clue(i, out_clue) {
        let button_clue = document.querySelector(`.clue_${i}`);
        button_clue.style = 'display: inline';
        //console.log(button_clue);
        button_clue.addEventListener('click', function () {
            button_clue.style = 'display: none';
            out_clue.style = 'display: inline';
            out_clue.textContent = `Правильный ответ: ${rul_array[i]}`
        })

    }
})();



