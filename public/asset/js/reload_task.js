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
     * let correct_answers_array - массив, в котором хранится число вернхы ответов пользовтеля.
     * let h1_clue  - переменная для вывода заголовка - "Варианты ответов", по умолчаниию hidden.
     * let correct_answer_user_in_one_task - переменная количество правильных ответов пользователя в одной карточке, где присутсвуют 3-4 задания.
     * let a_dalee - переменная для скрытия <a> тега в общем потоке, дабы убрать кнопку перехода на след. страницу.
     * let user_clicks - переменная, которая считает количкство clicks у кнопки - button_task_${i}.
     * 
     * Функции:
     * function output_result(data, i, out_clue){} - выводит результат введенных пользовтелем данных, если все верно
     * то на экране будет выведно храниемое в переменной - data значение и найденая подстрока - strOutPut
     * function try_answer(out_clue){} - выводит забавные реплики при первых двух неверных ответах
     * function clue(i, out_clue) {} - на третий неправильный ответ логика предлагает воспользовться подсказкой через <button>
     * function empty_string( ) - проверка на пустую строку в теге input_task.
     * function invisible_button(counter_correct_answer, counter_input) - функция, которая делает выдимой кнопку перехода на следующую страницу, если все ответы в задании даны верно.
     * ------------------------------------------------------------------------------------------------------------------------------------------------
     */

    //блок для перехода на след. стр., с возможностью автоматической подставкой хоста и протокола черз window.location
    let host = window.location.host;
    let protocol = window.location.protocol;
    let string = `//${host}/profiles/saveprogress/${segments[0]},${segments[1]},${segments[2]}`;
    //let string = `http://${host}/profiles/saveprogress/${segments[0]},${segments[1]},${segments[2]}`;

    //блок получения всех input, которые инициализирубтся циклом шаблонизатора - blade
    let input_task = document.getElementsByClassName('input_task');
    input_task = Array.from(input_task);
    //console.log("проверка связи " + input_task);

    // массив рег. выражений, которые через логику получаем из БД
    let rul_array = [];
    //console.log('итоговый массив верных ответов (шаблонов рег. выражений) после итераций' + rul_array)
    let count_try_answer = 0;
    let rule_clue = [];

    //массив правильных ответов пользовтеля:
    let answers_array = [];
    //переменная, которая отмечает правильные и неправильные ответы в значении массива - correct_answers_array
    let answers_bool = undefined;

    //Переменная для скрытия <a> тега в общем потоке, дабы убрать кнопку перехода на след. страницу:
    let a_dalee = document.querySelector('.a_dalee');
    a_dalee.style = "visibility: hidden";

    //основной цикл перебора строки ввода ответов пользователя с последующим сопостовлением с верными ответами
    for (let i = 0; i < input_task.length; i++) {
        //console.log("проверка итераций" + i);
        /** 
        * h1_clue - переменная для вывода заголовка - "Варианты ответов", по умолчаниию hidden, 
        * которая передается в функцию - output_result
        */
        let h1_clue = document.querySelector(`.h4_clue_${i}`);

        /** 
        * out_clue - переменная для вывода подсказок, по умолчаниию hidden, 
        * которая передается в функцию - output_result
        */
        let out_clue = document.querySelector(`.out_clue_${i}`);

        /** 
        * основная функция, которая принимет в себя множество переменных и распределяет их по другим функциям
        * в случае верного или неверного ответва пользовтеля при нажатии на кнопку - "Проверить":
        */
        document.querySelector(`.button_task_${i}`).addEventListener('click', function () {
            console.log(answers_bool);
            let rule_use = document.querySelector(`.rule_use_${i}`).textContent;
            rule_clue[i] = rule_use;
            //console.log("данные из бд" + rule_clue);
            rul_array[i] = rule_use.split(' | ');
            //console.log("массив верных ответов после добавления в него значения" + rul_array);

            let data = input_task[i].value;
            //console.log("введенные данные пользователем" + data);

            //проверка на пустую строку:
            data == !' ' ? empty_string(i) : output_result(data, i, out_clue, h1_clue);
            //console.log('итоговый массив количества верных ответов пользователя ' + correct_answers_array);

            //функция для вывода кнопки перехода на следующую страницу:
            invisible_button(answers_array.length, input_task.length)

        })

    }

    // функция проверки на пустую строку
    function empty_string(i) {
        document.querySelector(`.out_task_${i}`).style = "color: violet";
        document.querySelector(`.out_task_${i}`).textContent = `
                Вы забыли вести регулярное выражение.
            `;
    }

    // функция с блоком ветвления, в которую передается и сравнивается введеный ответ пользователя
    function output_result(data, i, out_clue, h1_clue) {
        if (data == rul_array[i][0]
            || data == rul_array[i][1]
            || data == rul_array[i][2]
            || data == rul_array[i][3]
            || data == rul_array[i][4]
            || data == rul_array[i][5]
            || data == rul_array[i][6]
            || data == rul_array[i][7]
        ) {

            out_clue.style = 'visibility:hidden';
            h1_clue.style = 'visibility:hidden';

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
            
            answers_choice(i);
            

        } else {

            count_try_answer++;

            out_clue.textContent = ``;

            /** 
             * тернарный оператор для вывода на странице верного ответа либо кнопки с подсказкой после 
             * после двух неверных ответов
            */
            count_try_answer > 2 ? (
                clue(i, out_clue, h1_clue),
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

    // функция выводка забавных ответов в случае неверно ответа пользовтелем:
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
        out_clue.style = 'visibility:visible';
        random_funny_unswer = Math.floor(Math.random() * (3 + 2))
        //console.log(random_funny_unswer);
        out_clue.textContent = `${funny_unswer[random_funny_unswer]}`;
    }

    // функция для вывода кнопки подсказки + подсказки:
    function clue(i, out_clue, h1_clue) {
        console.log(answers_bool);
        let button_clue = document.querySelector(`.clue_${i}`);
        button_clue.style = 'visibility:visible';
        //console.log(button_clue);
        button_clue.addEventListener('click', function () {
            h1_clue.style = 'visibility:visible';
            button_clue.style = 'visibility:hidden';
            out_clue.style = 'visibility:visible';
            for(let counter = 0; counter < rul_array[i].length; counter++){
                out_clue.innerHTML += `<ul><li>${rul_array[i][counter]}</li></ul>`
            }
        })
        answers_bool = false;
    }

    function answers_choice(i){
        //блок подсчета правильных и неправильных ответов пользовтеля в карточке заданий:
        //сравниваем полученный результат ответа:
        answers_bool == false ? 
            answers_bool = false : 
            answers_bool = true;

        answers_array[i] = answers_bool;
        //блокируем кнопку после ввода правильного ответа:
        document.querySelector(`.button_task_${i}`).disabled = 'true';
        answers_bool= undefined;
        console.log(`Массив верных и не верных ответов пользовтеля ${answers_array}`);
    }

    //функция, которая делает выдимой кнопку перехода на следующую страницу, если все ответы в задании даны верно.
    function invisible_button(counter_correct_answer, counter_input) {    
        if (counter_input == counter_correct_answer){
            let true_answers_array =  answers_array.filter(true_answers => true_answers == true);
            let false_answers_array =  answers_array.filter(false_answers => false_answers == false);
            console.log(false_answers_array.length);
            console.log(true_answers_array.length);
            a_dalee.style = "visibility: visible";
            protocol = protocol.match(/http.?:/);
            a_dalee.setAttribute('href',`${protocol}${string},${true_answers_array.length},${false_answers_array.length}`);
        }           
    }

})();



