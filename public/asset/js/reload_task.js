; (function () {

    // Блок для получения из input HTMLCollection, которая из-за цикла определяет количество выводов
    let input_task = document.getElementsByClassName('input_task');
    input_task = Array.from(input_task);
    //console.log("проверка связи " + input_task);
    //---------------------------------------------------------------------------------------

    let rul_array = [];// переменная для хранения рег. выражений из БД для дальнейшего сравнения с ответом пользовтеля
    //console.log('итоговый массив верных ответов после итераций' + rul_array)

    let count_try_answer = 0;
    for (let i = 0; i < input_task.length; i++) {
        console.log("проверка итераций" + i);
        let out_clue = document.querySelector(`.out_clue_${i}`);
        document.querySelector(`.button_task_${i}`).addEventListener('click', function () {
            let data = input_task[i].value;
            console.log("введенные данные пользователем" + data);

            let rule_use = document.querySelector(`.rule_use_${i}`).textContent;
            rul_array[i] = rule_use.split(', ');
            //console.log("массив верных ответов после добавления в него значения" + rul_array);
            if (data == rul_array[i][0]
                || data == rul_array[i][0 + 1]
                || data == rul_array[i][0 + 2]
                || data == rul_array[i][0 + 3]
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

                count_try_answer > 2 ? (clue(),
                    count_try_answer = 0,
                    out_clue.textContent = ``)
                : try_answer();

                document.querySelector(`.out_task_${i}`).style = "color: red";
                document.querySelector(`.out_task_${i}`).textContent = `
                    Вы не верно подобрали регулярное выражение - /${data}/, попробуйте еще раз.
                `;
                // предусмотреть функцию, которая будет выводить подсказку.
            }
            //out_clue.style = 'display: none';
        })

        function clue() {
            let button_clue = document.querySelector(`.clue_${i}`);
            button_clue.style = 'display: inline';
            console.log(button_clue);
            button_clue.addEventListener('click', function () {
                button_clue.style = 'display: none';
                out_clue.style = 'display: inline';
                out_clue.textContent = `Правильный ответ: ${rul_array[i]}`

            })

        }

        function try_answer() {
            let random_funny_unswer = 0;
            let funny_unswer = [
                'Зачем ты так? подумай еще...',
                'Вероятно тебе стоит подучить правила?',
                'А ты не сдаешься, так ведь? Попробуй еще!',
                'Учение свет, а не учениe - чуть свет и на работу, попробуй еще!',
                'Ну-ну, не стоит спешить! Попробуй еще раз, у тебя все получится!',
                `Попробуй еще раз, дружок - пирожок :)`
            ];

            //console.log(out_clue);
            out_clue.style = 'display: inline';
            random_funny_unswer = Math.floor(Math.random() * (3+2))
            //console.log(random_funny_unswer);
            out_clue.textContent = `${funny_unswer[random_funny_unswer]}`;
        }

    }
})();



