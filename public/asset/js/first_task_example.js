;( function(){
// переменная для проверки введеных пользователем ответов:
let arrRegExps = [
    ['a.b', 'a\\wb'],
    ['a..a', 'a\\w\\wa'],
    ['ab.a', 'ab\\wa', 'a[^d].a', 'a[^d]\\wa']
];

//переменная для проверяемой строки:

let str = 'ahb acb aeb aaaab caeeb adcb axeb bbbba aba aca aea xxyxx abba adca abea';

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

// лог-блок с 1-ым заданием

let input_tasck_1 = document.querySelector('.input_task_1');
let out_task_1 = document.querySelector('.out_task_1');

document.querySelector('.button_task_1').addEventListener('click', function (){
    let data = input_tasck_1.value;
    console.log(data);
    if (data == arrRegExps[0][0] || data == arrRegExps[0][1]) {
        let newRegExp = new RegExp(data, 'g');
        console.log(newRegExp);
        let strOutPut_1 = str.match(newRegExp);
        strOutPut_1 = strOutPut_1.join(', ');
        out_task_1.innerHTML = `
            Ваш вариант регулярного выражения - /${data}/ верен, результат поиска: ${strOutPut_1}
        `;
    } else{
        out_task_1.innerHTML = `
            Вы не верно подобрали регулярное выражение - /${data}/, попробуйте еще раз.
        `;
    }
})

// лог-блок с 2-ым заданием

let input_tasck_2 = document.querySelector('.input_task_2');
let out_task_2 = document.querySelector('.out_task_2');

document.querySelector('.button_task_2').addEventListener('click', function (){
    let data = input_tasck_2.value;
    console.log(data);
    if (data == arrRegExps[1][0] || data == arrRegExps[1][1]) {
        let newRegExp = new RegExp(data, 'g');
        console.log(newRegExp);
        let strOutPut_2 = str.match(newRegExp);
        strOutPut_2 = strOutPut_2.join(', ');
        out_task_2.innerHTML = `
            Ваш вариант регулярного выражения - /${data}/ верен, результат поиска: ${strOutPut_2}
        `;
    } else{
        out_task_2.innerHTML = `
            Вы не верно подобрали регулярное выражение - /${data}/, попробуйте еще раз.
        `;
    }
})

// лог-блок с 3-ым заданием

let input_tasck_3 = document.querySelector('.input_task_3');
let out_task_3 = document.querySelector('.out_task_3');

document.querySelector('.button_task_3').addEventListener('click', function (){
    let data = input_tasck_3.value;
    console.log(data);
    if (data == arrRegExps[2][0] || data == arrRegExps[2][1] || data == arrRegExps[2][2]) {
        let newRegExp = new RegExp(data, 'g');
        console.log(newRegExp);
        let strOutPut_3 = str.match(newRegExp);
        strOutPut_3 = strOutPut_3.join(', ');
        out_task_3.innerHTML = `
            Ваш вариант регулярного выражения - /${data}/ верен, результат поиска: ${strOutPut_3}
        `;
    } else{
        out_task_3.innerHTML = `
            Вы не верно подобрали регулярное выражение - /${data}/, попробуйте еще раз.
        `;
    }
})

let new_str = 'Вечером я завел будильник на 06:00 утра, но он просигналил в 05:00, тогда я решил поставить будильник на 06:15, но к моему удивлению он прозвонил в 09:15, из-за чего я пришел в школу только к 11:00';
//let newRegExpTest = new RegExp('\\W+','g');
let newRegExpTest = new RegExp('\\d+:\\d+','g');
//let newRegExpTest = `/[1–9]+/g`;
//let newRegExpTest = new RegExp('(чик)+', 'g');
console.log(newRegExpTest);
let new_str_1 = new_str.match(newRegExpTest);
console.log(new_str_1);
new_str_1 = new_str_1.join(', ');
console.log(new_str_1)

}) ();