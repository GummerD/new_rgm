// блок с подсказкой:
let clue = `<ul>
    <li>/abc/ Идущие подряд символы abc</li>
    <li>/[abc]/ Один из символов a, b или c </li>
    <li> /[abc]/ Один из символов a, b или c</li>
    <li>/[a-z]/ Диапазон символов, идущих подряд в таблице Unicode </li>
    <li> /[^a]/ Исключить символ из поиска </li><li> /\\b/ Граница слова </li>
    <li> /\\B/ Не граница слова </li> <li> /\\d/ Цифра </li><li> /\\D/ Не цифра </li>
    <li> /\\w/ Латинская буква, цифра или _ </li>
    <li>/\\W/ Не латинская буква, не цифра и не _ </li>
    <li> /\\s/ Пробельный символ</li>
    <li> /\\S/ Непробельный символ </li>
    <li> /a{3}/ Строго 3 символа а подряд </li>
    <li> /a{2,4}/ От 2 до 4 символов а подряд </li>
    <li>/a+/ 1 и более символов а подряд</li>
    <li>/a*/ 0 и более символов а подряд</li>
    <li>/a?/ 0 или 1 символ а</li>
    <li>/./ Один любой символ, кроме переноса строки</li>
    <li>/(abс)+/ одноврменный поиск нескольких символов подряд </li>
</ul>`;

let out_clue = document.querySelector('.out_clue');

let button_clue = document.querySelector('.button_clue').addEventListener('click', function (){
    if (out_clue.innerHTML == '') out_clue.innerHTML = clue; // условия свернуть развернуть подсказку по клику на кнопку
    else document.querySelector('.out_clue').innerHTML = '';
})


//1лог-блок 
let user_answer_0 = document.querySelector('.input_task_0');
//console.log(user_answer_0);
let out_task_0 = document.querySelector('.out_task_0');
let correct_answer_0 = document.querySelector('.correct_answer_0').textContent;
//console.log(correct_answer_0);
let rule_use_0 = document.querySelector('.rule_use_0').textContent;
//console.log(rule_use_0);
let string_task_0 = document.querySelector('.string_task_0').textContent;
console.log("строка" + string_task_0);
let rule_use_array_0 =  rule_use_0.split(' ');
//console.log('правило' + rule_use_array_0);

document.querySelector('.button_task_0').addEventListener('click', function (){;
    let data = user_answer_0.value
    console.log("введенные даные " + data);
        if (data == rule_use_array_0[0]) {
            let newRegExp = new RegExp(data, 'g');
            console.log('рег выражение' + newRegExp);
            let strOutPut = string_task_0.match(newRegExp);
            strOutPut = strOutPut.join(', ');
            out_task_0.style = "color: green";
            out_task_0.innerHTM = `
                Ваш вариант регулярного выражения - /${data}/ верен, результат поиска: ${strOutPut}
            `;
        } else{
            out_task_0.style = "color: red";
            out_task_0.textContent = `
                Вы не верно подобрали регулярное выражение - /${data}/, попробуйте еще раз.
            `;
        }
    
})

//2 лог-блок 
let user_answer_1 = document.querySelector('.input_task_1');
//console.log(user_answer_1);
let out_task_1 = document.querySelector('.out_task_1');
let correct_answer_1 = document.querySelector('.correct_answer_1').textContent;
//console.log(correct_answer_1);
let rule_use_1 = document.querySelector('.rule_use_1').textContent;
//console.log(rule_use_0);
let string_task_1 = document.querySelector('.string_task_1').textContent;
//console.log("строка" + string_task_0);
let rule_use_array_1 =  rule_use_1.split(' ');
//console.log('правило' + rule_use_array_0);

document.querySelector('.button_task_1').addEventListener('click', function (){;
    let data = user_answer_1.value
    console.log("введенные даные " + data);
        if (data == rule_use_array_1[0]) {
            let newRegExp = new RegExp(data, 'g');
            console.log('рег выражение' + newRegExp);
            let strOutPut = string_task_1.match(newRegExp);
            strOutPut = strOutPut.join(', ');
            out_task_1.style = "color: green";
            out_task_1.innerHTML = `
                Ваш вариант регулярного выражения - /${data}/ верен, результат поиска: ${strOutPut}
            `;
        } else{
            out_task_1.style = "color: red";
            out_task_1.textContent = `
                Вы не верно подобрали регулярное выражение - /${data}/, попробуйте еще раз.
            `;
        }
    
})


//3 лог-блок 
let user_answer_2 = document.querySelector('.input_task_2');
//console.log(user_answer_2);
let out_task_2 = document.querySelector('.out_task_2');
let correct_answer_2 = document.querySelector('.correct_answer_2').textContent;
//console.log(correct_answer_2);
let rule_use_2 = document.querySelector('.rule_use_2').textContent;
//console.log(rule_use_0);
let string_task_2 = document.querySelector('.string_task_2').textContent;
//console.log("строка" + string_task_2);
let rule_use_array_2 =  rule_use_2.split(' ');
//console.log('правило' + rule_use_array_2);

document.querySelector('.button_task_2').addEventListener('click', function (){;
    let data = user_answer_2.value
    console.log("введенные даные " + data);
        if (data == rule_use_array_2[0]) {
            let newRegExp = new RegExp(data, 'g');
            console.log('рег выражение' + newRegExp);
            let strOutPut = string_task_2.match(newRegExp);
            strOutPut = strOutPut.join(', ');
            out_task_2.style = "color: green";
            out_task_2.innerHTML = `
                Ваш вариант регулярного выражения - /${data}/ верен, результат поиска: ${strOutPut}
            `;
        } else{
            out_task_2.style = "color: red";
            out_task_2.textContent = `
                Вы не верно подобрали регулярное выражение - /${data}/, попробуйте еще раз.
            `;
        }
    
})

//4 лог-блок 
let user_answer_3 = document.querySelector('.input_task_3');
//console.log(user_answer_2);
let out_task_3 = document.querySelector('.out_task_3');
let correct_answer_3 = document.querySelector('.correct_answer_3').textContent;
//console.log(correct_answer_2);
let rule_use_3 = document.querySelector('.rule_use_3').textContent;
//console.log(rule_use_0);
let string_task_3 = document.querySelector('.string_task_3').textContent;
//console.log("строка" + string_task_2);
let rule_use_array_3 =  rule_use_3.split(' ');
console.log('правило ' + rule_use_array_2);

document.querySelector('.button_task_3').addEventListener('click', function (){;
    let data = user_answer_3.value
    console.log("введенные даные " + data);
        if (data == rule_use_array_3[0]) {
            let newRegExp = new RegExp(data, 'g');
            console.log('рег выражение' + newRegExp);
            let strOutPut = string_task_3.match(newRegExp);
            strOutPut = strOutPut.join(', ');
            out_task_3.style = "color: green";
            out_task_3.innerHTML = `
                Ваш вариант регулярного выражения - /${data}/ верен, результат поиска: ${strOutPut}
            `;
        } else{
            out_task_3.style = "color: red";
            out_task_3.textContent = `
                Вы не верно подобрали регулярное выражение - /${data}/, попробуйте еще раз.
            `;
        }
    
})

