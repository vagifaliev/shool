<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
<title>
    Тестируем JS
</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mocha/3.2.0/mocha.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mocha/3.2.0/mocha.js"></script>
    <script>
        // alert('Из HEAD: ' + document.body);
        mocha.setup('bdd');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chai/3.5.0/chai.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chai/3.5.0/chai.js"></script>
    <script>
        // chai предоставляет большое количество функций. Объявим assert глобально
        let assert = chai.assert;
    </script>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
            padding: 3px 5px;
        }
    </style>
</head>

<body>
{{--<div>--}}
    {{--<script>--}}
        {{--function pow(x, n) {--}}
            {{--result = 1;--}}

            {{--for (i = 0; i < n; i++) {--}}
                {{--result *= x;--}}
            {{--}--}}
            {{--return result;--}}
        {{--}--}}

        {{--let user = {--}}
            {{--name: 'Jonny',--}}
            {{--age: 30,--}}
            {{--subHop: function () {--}}
                {{--alert(`${this.name} Hi, ты мудак. Тебе уже ${this.age}!`);--}}
            {{--}--}}
        {{--};--}}

        {{--user.sayHi = function () {--}}
            {{--alert('Привет не боги!!!');--}}
            {{--alert(user['sayHi']);--}}
        {{--};--}}

        {{--// user.sayHi();--}}
        {{--// user.subHop();--}}

        {{--user = {--}}
            {{--funHiop() {--}}
                {{--alert('Сокращенная запись');--}}
            {{--}--}}
        {{--};--}}

        {{--// user.funHiop();--}}



        {{--let calculator = {--}}
            {{--one: null,--}}
            {{--two: null,--}}
            {{--read : function () {--}}
                {{--this.one = +prompt('Введит первое значение', 0);--}}
                {{--this.two = +prompt('введите второе значение', 0);--}}
            {{--},--}}
            {{--sum: function () {--}}
                {{--return this.one + this.two;--}}
            {{--},--}}
            {{--mul: function () {--}}
                {{--return this.one * this.two;--}}
            {{--}--}}
        {{--}--}}

        {{--// calculator.read();--}}
        {{--// alert(calculator.sum());--}}
        {{--// alert(calculator.mul());--}}
        {{--let ladder = {--}}
            {{--step: 0,--}}
            {{--up() {--}}
                {{--this.step++;--}}
                {{--return this;--}}
            {{--},--}}
            {{--down() {--}}
                {{--this.step--;--}}
                {{--return this;--}}
            {{--},--}}
            {{--showStep: function() { // показывает текущую ступеньку--}}
                {{--alert( this.step );--}}
            {{--}--}}
        {{--};--}}

        {{--// ladder.up().up().up().down().showStep();--}}
        {{--let str = "Привет";--}}

        {{--str.test = 5;--}}
        {{--// alert(str.test);--}}
        {{--// let num1 = +prompt('Введите первое число', '?');--}}
        {{--// let num2 = +prompt('Введите второе число', '?');--}}
        {{--// let sum = +num1.toFixed(1) + +num2.toFixed(1);--}}
        {{--// alert(`Сумма чисел ${num1} и ${num2} равна ${sum}`);--}}
        {{--// let num1 = prompt('Введите число', 0);--}}
        {{--// let num2 = prompt('Введите второе число', 0);--}}
        {{--//--}}
        {{--// function random(x, y) {--}}
        {{--//     let numRand = null;--}}
        {{--//     while (true) {--}}
        {{--//         numRand = Math.random() * 10;--}}
        {{--//         if (+y > +numRand.toFixed(0) && +numRand.toFixed(0) > +x) {--}}
        {{--//             alert(`Получено значение ${numRand.toFixed(0)} находящиеся между\nЧислами ${x} и ${y}`);--}}
        {{--//             break;--}}
        {{--//         }--}}
        {{--//         if (prompt('Остановить цикл?', '') == 'yes') {--}}
        {{--//             break;--}}
        {{--//         }--}}
        {{--//     }--}}
        {{--//--}}
        {{--//     return numRand.toFixed(0);--}}
        {{--// }--}}
        {{--//--}}
        {{--// alert(random(num1, num2));--}}
        {{--function upperLetter(x) {--}}
            {{--let firstLetter = x[0].toUpperCase();--}}
            {{--for (let i = 1; i < x.length; i++) {--}}
                {{--firstLetter += x[i];--}}
            {{--}--}}

            {{--return firstLetter;--}}
        {{--}--}}

        {{--function checkSpam(text) {--}}
            {{--let badText1 = 'viagra';--}}
            {{--let badText2 = 'xxx';--}}
            {{--if (text.toLowerCase().includes(badText1) || text.toLowerCase().includes(badText2))--}}
                    {{--return true;--}}
            {{--return false;--}}
        {{--}--}}

        {{--// // alert(checkSpam('uuuuXXviAgraafff'));--}}
        {{--// function truncate(text, len) {--}}
        {{--//     let textAdd = '';--}}
        {{--//     let leng = text.length > +len ? len : text.length;--}}
        {{--//     alert(`Тип ${typeof leng}`);--}}
        {{--//     for (let i = 0; i <= leng; i++) {--}}
        {{--//         textAdd = textAdd + text[i];--}}
        {{--//     }--}}
        {{--//     return textAdd + '...';--}}
        {{--// }--}}
        {{--//--}}
        {{--// alert(truncate("Вот, что мне хотелось бы сказать на эту тему:", 20));--}}

        {{--// let styles = [--}}
        {{--//     'Джаз',--}}
        {{--//     'Блюз',--}}
        {{--// ];--}}
        {{--//--}}
        {{--// styles.push('Рок-н-рол');--}}
        {{--// let center = styles.length / 2;--}}
        {{--// styles[Math.floor(center)] = 'Классика';--}}
        {{--// alert(styles.shift());--}}
        {{--// alert(styles);--}}
        {{--// styles.unshift('Рэп', 'Регги');--}}
        {{--// alert(styles);--}}

        {{--// function sumInput() {--}}
        {{--//     let count = 0;--}}
        {{--//     let numLetter = [];--}}
        {{--//     while (true) {--}}
        {{--//         let temp = prompt('Введит число', '');--}}
        {{--//         if (temp == null) {--}}
        {{--//             let sumNumber = 0;--}}
        {{--//             for (let i = 0; i < numLetter.length; i++ ) {--}}
        {{--//                 sumNumber = sumNumber + numLetter[i];--}}
        {{--//             }--}}
        {{--//--}}
        {{--//             return sumNumber;--}}
        {{--//         }--}}
        {{--//         numLetter[count] = +temp;--}}
        {{--//         count++;--}}
        {{--//     }--}}
        {{--// }--}}
        {{--//--}}
        {{--// alert(sumInput());--}}

        {{--// function camelize(text) {--}}
        {{--//     let arr = text.split('-');--}}
        {{--//     let firstLetter = [];--}}
        {{--//     arr.forEach(item => firstLetter.push(item[0].toUpperCase() + item.slice(1)));--}}
        {{--//--}}
        {{--//     return firstLetter.join('');--}}
        {{--// }--}}
        {{--//--}}
        {{--// alert(camelize("background-color-super"))--}}

        {{--// function filterRange(arr, a, b) {--}}
        {{--//     return arr.filter(item =>  a < item && item < b);--}}
        {{--//--}}
        {{--// }--}}
        {{--//--}}
        {{--// alert(filterRange([1,2,3,4,5,6,7,8], 2, 7));--}}

        {{--// function filterRangeInPlace(arr, a, b) {--}}
        {{--//     arr.forEach(function(item, index) {if(a >= item) arr.splice(index,1)});--}}
        {{--//--}}
        {{--//     return arr;--}}
        {{--// }--}}
        {{--//--}}
        {{--// alert(filterRangeInPlace([1,2,3,4,5,6,7,8], 3, 6))--}}

        {{--// let arr = [5, 2, 1, -10, 8];--}}
        {{--// arr.sort()--}}
        {{--//--}}
        {{--// alert(arr);--}}

        {{--// let arr = ['HTML', 'JavaScript', 'CSS'];--}}
        {{--//--}}
        {{--// function copySorted(arr) {--}}
        {{--//     return arr--}}
        {{--//         .concat()--}}
        {{--//         .sort();--}}
        {{--// }--}}
        {{--//--}}
        {{--// let sorted = copySorted(arr);--}}
        {{--// alert(sorted);--}}
        {{--// alert(arr);--}}

        {{--// function Calculator(string) {--}}
        {{--//     this.arrString = string.split(' ');--}}
        {{--//--}}
        {{--//     return this.arrString;--}}
        {{--// }--}}
        {{--//--}}
        {{--// alert(new Calculator('3 + 7'));--}}
        {{--//--}}
        {{--// let vasya = { name: "Вася", surname: "Пупкин", id: 1 };--}}
        {{--// let petya = { name: "Петя", surname: "Иванов", id: 2 };--}}
        {{--// let masha = { name: "Маша", surname: "Петрова", id: 3 };--}}
        {{--//--}}
        {{--// let users = [ vasya, petya, masha ];--}}
        {{--// let usersMapped = users.map(user => ({--}}
        {{--//     fullName: `${user.name} ${user.surname}`,--}}
        {{--//     id: user.id--}}
        {{--// }));--}}
        {{--//--}}
        {{--// alert(usersMapped[1].fullName);--}}
        {{--// let vasya = { name: "Вася", age: 25 };--}}
        {{--// let petya = { name: "Петя", age: 30 };--}}
        {{--// let masha = { name: "Маша", age: 28 };--}}
        {{--//--}}
        {{--// let arr = [ vasya, petya, masha ];--}}
        {{--//--}}
        {{--// function sortByAge(arr) {--}}
        {{--//     return arr.sort((a, b) => a.age - b.age);--}}
        {{--// }--}}
        {{--//--}}
        {{--// sortByAge(arr);--}}
        {{--//--}}
        {{--// alert(arr[1].name);--}}
        {{--// function getAverageAge(arr) {--}}
        {{--//     return arr.reduce((previosValue, item, index) => item.age + previosValue, 0) / arr.length;--}}
        {{--// }--}}
        {{--//--}}
        {{--// let vasya = { name: "Вася", age: 25 };--}}
        {{--// let petya = { name: "Петя", age: 30 };--}}
        {{--// let masha = { name: "Маша", age: 29 };--}}
        {{--//--}}
        {{--// let arr = [ vasya, petya, masha ];--}}
        {{--//--}}
        {{--// alert( getAverageAge(arr) );--}}
        {{--// function unique(arr) {--}}
        {{--//     return arr.reduce((previosValue, item, index) => previosValue.push(item), []);--}}
        {{--// }--}}
        {{--//--}}
        {{--// let strings = ["кришна", "кришна", "харе", "харе",--}}
        {{--//     "харе", "харе", "кришна", "кришна", ":-O"--}}
        {{--// ];--}}
        {{--//--}}
        {{--// alert( unique(strings) );--}}

        {{--// let date = new Date();--}}
        {{--// alert(Date.now());--}}

        {{--// function unique(arr) {--}}
        {{--//     return Array.from(new Set(arr));--}}
        {{--// }--}}
        {{--//--}}
        {{--//--}}
        {{--// let values = ["Hare", "Krishna", "Hare", "Krishna",--}}
        {{--//     "Krishna", "Krishna", "Hare", "Hare", ":-O"--}}
        {{--// ];--}}
        {{--//--}}
        {{--// alert( unique(values) ); // Hare,Krishna,:-O--}}

        {{--// function aclean(arr) {--}}
        {{--//     let set = new Set(arr);--}}
        {{--//     return set.forEach((value) => {--}}
        {{--//--}}
        {{--//     });--}}
        {{--// }--}}
        {{--//--}}
        {{--// let arr = ["nap", "teachers", "cheaters", "PAN", "ear", "era", "hectares"];--}}
        {{--//--}}
        {{--// alert( aclean(arr) ); // "nap,teachers,ear" or "PAN,cheaters,era"--}}

        {{--// let map = new Map();--}}
        {{--// map.set("name", "John");--}}
        {{--// let keys = Array.from(map.keys());--}}
        {{--// keys.push("more");--}}
        {{--// alert(keys);--}}

        {{--// let messages = [--}}
        {{--//     {text: "Hello", from: "John"},--}}
        {{--//     {text: "How goes?", from: "John"},--}}
        {{--//     {text: "See you soon", from: "Alice"}--}}
        {{--// ];--}}

        {{--// function sumSalaries(obj) {--}}
        {{--//     let pos = 0;--}}
        {{--//     for (let item of Object.values(obj)) {--}}
        {{--//         pos = pos + item;--}}
        {{--//     }--}}
        {{--//     return pos;--}}
        {{--// }--}}
        {{--//--}}
        {{--// let salaries = {--}}
        {{--//     "John": 100,--}}
        {{--//     "Pete": 300,--}}
        {{--//     "Mary": 250--}}
        {{--// };--}}
        {{--//--}}
        {{--// alert( sumSalaries(salaries) ); // 650--}}
        {{--// function count(obj) {--}}
        {{--//     return Object.keys(obj).length;--}}
        {{--// }--}}
        {{--//--}}
        {{--// let userName = {--}}
        {{--//     name: 'John',--}}
        {{--//     age: 30,--}}
        {{--//     test: 'bog'--}}
        {{--// };--}}
        {{--//--}}
        {{--// alert( count(userName) ); // 2--}}

        {{--// let users = { name: "John", years: 30 };--}}
        {{--// let {name, years:age, isAdmin = false} = users;--}}
        {{--//--}}
        {{--// alert( name ); // John--}}
        {{--// alert( age ); // 30--}}
        {{--// alert( isAdmin ); // false--}}

        {{--// function makeCounter() {--}}
        {{--//     function counter() {--}}
        {{--//         return counter.num++;--}}
        {{--//     }--}}
        {{--//--}}
        {{--//     counter.num = 0;--}}
        {{--//     counter.set = function (value) {--}}
        {{--//         return counter.num = value;--}}
        {{--//     }--}}
        {{--//--}}
        {{--//     counter.decrease = function() {--}}
        {{--//         return counter.num--;--}}
        {{--//     }--}}
        {{--//     return counter;--}}
        {{--// }--}}
        {{--//--}}
        {{--// let counter = makeCounter();--}}
        {{--// alert(counter());--}}
        {{--// alert(counter.set(30));--}}
        {{--// alert(counter());--}}
        {{--// alert(counter.decrease());--}}
        {{--// alert(counter.decrease());--}}
        {{--// alert(counter.decrease());--}}
        {{--// alert(counter());--}}

        {{--// function printNumbers(from, to) {--}}
        {{--//     let n = from;--}}
        {{--//     let timerId = setInterval(() => {--}}
        {{--//         if (n ==  to - 1) {--}}
        {{--//             alert("Stop Timer!");--}}
        {{--//             clearInterval(timerId);--}}
        {{--//         }--}}
        {{--//         n++;--}}
        {{--//         alert(n);--}}
        {{--//     }, 2000);--}}
        {{--// }--}}
        {{--//--}}
        {{--// printNumbers(2, 10);--}}
        {{--// function printNumber(from, to) {--}}
        {{--//     let n = from;--}}
        {{--//     setTimeout(function tisk() {--}}
        {{--//         if (n < to) {--}}
        {{--//             setTimeout(tisk, 2000);--}}
        {{--//         }--}}
        {{--//         alert(n);--}}
        {{--//         n++;--}}
        {{--//--}}
        {{--//     }, 2000);--}}
        {{--// }--}}
        {{--//--}}
        {{--// printNumber(2, 5);--}}

        {{--// function work(a, b) {--}}
        {{--//     alert( a + b ); // произвольная функция или метод--}}
        {{--// }--}}
        {{--//--}}
        {{--// function spy(func) {--}}
        {{--//     let cache = new Map();--}}
        {{--//--}}
        {{--//     return function () {--}}
        {{--//         if (cache.has([].join.call(arguments))) {--}}
        {{--//             return cache.get([].join.call(arguments));--}}
        {{--//         }--}}
        {{--//--}}
        {{--//         let result = func.apply(this, arguments);--}}
        {{--//         cache.set([].join.call(arguments), result);--}}
        {{--//         return result;--}}
        {{--//     }--}}
        {{--//--}}
        {{--// }--}}
        {{--//--}}
        {{--//--}}
        {{--//--}}
        {{--// work = spy(work);--}}
        {{--//--}}
        {{--// work(1, 2); // 3--}}
        {{--// work(4, 5); // 9--}}
        {{--//--}}
        {{--// // for (let args of work.calls) {--}}
        {{--// //     alert( 'call:' + args.join() ); // "call:1,2", "call:4,5"--}}
        {{--// // }--}}

        {{--// function f(x) {--}}
        {{--//     alert(x);--}}
        {{--// }--}}
        {{--//--}}
        {{--// function delay(func, ...args) {--}}
        {{--//     return function(item) {--}}
        {{--//         setTimeout(func, args, item);--}}
        {{--//     }--}}
        {{--// }--}}
        {{--//--}}
        {{--// // создаём обёртки--}}
        {{--// let f1000 = delay(f, 10000);--}}
        {{--// let f1500 = delay(f, 20000);--}}
        {{--//--}}
        {{--// f1000("test"); // показывает "test" после 1000 мс--}}
        {{--// f1500("test"); // показывает "test" после 1500 мс--}}
        {{--//--}}
        {{--//--}}
        {{--// function debounce() {--}}
        {{--//--}}
        {{--// }--}}
        {{--//--}}
        {{--// let f = debounce(alert, 1000);--}}
        {{--//--}}
        {{--// f(1); // выполняется немедленно--}}
        {{--// f(2); // проигнорирован--}}
        {{--//--}}
        {{--// setTimeout( () => f(3), 100); // проигнорирован (прошло только 100 мс)--}}
        {{--// setTimeout( () => f(4), 1100); // выполняется--}}
        {{--// setTimeout( () => f(5), 1500); // проигнорирован (прошло только 400 мс от последнего вызова)--}}
        {{--//--}}

        {{--// let users = {--}}
        {{--//     get name() {--}}
        {{--//         return this._name;--}}
        {{--//     },--}}
        {{--//     set name(value) {--}}
        {{--//         if (value.length < 4) {--}}
        {{--//             alert("Имя слишком короткое, должно быть больше 4 символов");--}}
        {{--//             return;--}}
        {{--//         }--}}
        {{--//         this._name = value;--}}
        {{--//     }--}}
        {{--// };--}}
        {{--// users.name = "Pete";--}}
        {{--// // alert(users.name);--}}
        {{--// Object.function.prototype = Object.function.defer;--}}
        {{--//--}}
        {{--// function f() {--}}
        {{--//     alert("Hello!");--}}
        {{--// }--}}
        {{--//--}}
        {{--// Object.function.prototype = Object.function.defer;--}}
        {{--//--}}
        {{--// f.defer(1000); // выведет "Hello!" через 1 секунду--}}
        {{--// Function.prototype.defer = function (ms) {--}}
        {{--//     return (a, b) =>--}}
        {{--//         setTimeout(this, ms);--}}
        {{--// };--}}
        {{--//--}}
        {{--// function f(a, b) {--}}
        {{--//     alert( a + b );--}}
        {{--// }--}}
        {{--//--}}
        {{--// f.defer(1000)(1, 2);--}}
        {{--// function Dog(name, user) {--}}
        {{--//     this.name = name;--}}
        {{--//     this.surname = user;--}}
        {{--// }--}}
        {{--// Dog.prototype.toString = function () {--}}
        {{--//     return this.name;--}}
        {{--// };--}}
        {{--//--}}
        {{--// let gaf = new Dog('Чаппи', 'дворняшка');--}}
        {{--//--}}
        {{--// alert(gaf);--}}

        {{--// let dictionary = Object.create(null);--}}
        {{--// dictionary.prototype =  Object.prototype;--}}
        {{--// // dictionary.prototype.toString = function () {--}}
        {{--// //     return this.name;--}}
        {{--// // };--}}
        {{--// alert(dictionary);--}}


        {{--// // добавляем немного данных--}}
        {{--// dictionary.apple = "Apple";--}}
        {{--// dictionary.__proto__ = "test"; // здесь __proto__ -- это обычный ключ--}}
        {{--//--}}
        {{--// // только apple и __proto__ выведены в цикле--}}
        {{--// for(let key in dictionary) {--}}
        {{--//     alert(key); // "apple", затем "__proto__"--}}
        {{--// }--}}
        {{--//--}}
        {{--// // ваш метод toString в действии--}}
        {{--// alert(dictionary); // "apple,__proto__"--}}

        {{--// class Clock {--}}
        {{--//     timer = null;--}}
        {{--//     constructor({template}) {--}}
        {{--//         this.template = template;--}}
        {{--//     }--}}
        {{--//     render() {--}}
        {{--//         let date = new Date();--}}
        {{--//         this.hours = date.getHours();--}}
        {{--//         if (this.hours < 10) this.hours = '0' + this.hours;--}}
        {{--//--}}
        {{--//         this.mins = date.getMinutes();--}}
        {{--//         if (this.mins < 10) this.mins = '0' + this.mins;--}}
        {{--//--}}
        {{--//         this.secs = date.getSeconds();--}}
        {{--//         if (this.secs < 10) this.secs = '0' + this.secs;--}}
        {{--//--}}
        {{--//         let output = this.template--}}
        {{--//             .replace('h', this.hours)--}}
        {{--//             .replace('m', this.mins)--}}
        {{--//             .replace('s', this.secs)--}}
        {{--//--}}
        {{--//         console.log(output);--}}
        {{--//     }--}}
        {{--//--}}
        {{--//     stop = function () {--}}
        {{--//         clearInterval(this.timer);--}}
        {{--//     };--}}
        {{--//--}}
        {{--//     start = function () {--}}
        {{--//         this.render();--}}
        {{--//         this.timer = setInterval(() => this.render(), 1000);--}}
        {{--//     };--}}
        {{--// }--}}
        {{--//--}}
        {{--// class ExtendedClock extends Clock {--}}
        {{--//    constructor(options) {--}}
        {{--//        super(options);--}}
        {{--//       let { precision = 1000 } = options;--}}
        {{--//       this.precision = precision;--}}
        {{--//    }--}}
        {{--// }--}}
        {{--//--}}
        {{--// let clock = new Clock({template: 'h:m:s'});--}}
        {{--// clock.start();--}}
        {{--// try {--}}
        {{--//     alert('Начало блока try');--}}
        {{--//     lallalalal;--}}
        {{--//     alert('Конец блока try');--}}
        {{--// } catch (err) {--}}
        {{--//     alert('Ошибка приложения!');--}}
        {{--// }--}}

        {{--// function delay(ms) {--}}
        {{--//     return new Promise(function (resolve, reject) {--}}
        {{--//         setTimeout(resolve('run'), ms);--}}
        {{--//     });--}}
        {{--// }--}}
        {{--//--}}
        {{--// delay(3000).then(() => alert('выполнилось через 3 секунды'));--}}
    {{--</script>--}}





    {{--<script src="js/test.js"></script>--}}
    {{--<div id="mocha"></div>--}}

    {{--<script>--}}
        {{--mocha.run();--}}
    {{--</script>--}}
{{--</div>--}}

{{--<div>Начало</div>--}}

{{--<ul>--}}
    {{--<li>Информация</li>--}}
{{--</ul>--}}

{{--<div>Конец</div>--}}

{{--<script>--}}
    {{--for (let elem of document.body.children) {--}}
        {{--alert(elem);--}}
    {{--}--}}
{{--</script>--}}
    {{--<table id="table">--}}
        {{--<tr>--}}
            {{--<td>один</td><td>два</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>три</td><td>четыре</td>--}}
        {{--</tr>--}}
    {{--</table>--}}

    {{--<script>--}}
        {{--// выводит содержимое первой строки, второй ячейки--}}
        {{--alert( table.rows[0].cells[1].innerHTML ) // "два"--}}
    {{--</script>--}}
{{--</div>--}}
    {{--<div>Пользователи:</div>--}}
    {{--<ul>--}}
        {{--<li>Джон</li>--}}
        {{--<li>Пит</li>--}}
    {{--</ul>--}}
{{--<script>--}}
    {{--for (let elem of document.body.children) {--}}
        {{--if (true)--}}
            {{--alert(elem);--}}
    {{--}--}}
{{--</script>--}}
{{--</div>--}}
    {{--<table>--}}
        {{--<tr>--}}
            {{--<td id="sago">1:1</td>--}}
            {{--<td>2:1</td>--}}
            {{--<td>3:1</td>--}}
            {{--<td>4:1</td>--}}
            {{--<td>5:1</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>1:2</td>--}}
            {{--<td>2:2</td>--}}
            {{--<td>3:2</td>--}}
            {{--<td>4:2</td>--}}
            {{--<td>5:2</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>1:3</td>--}}
            {{--<td>2:3</td>--}}
            {{--<td>3:3</td>--}}
            {{--<td>4:3</td>--}}
            {{--<td>5:3</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>1:4</td>--}}
            {{--<td>2:4</td>--}}
            {{--<td>3:4</td>--}}
            {{--<td>4:4</td>--}}
            {{--<td>5:4</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>1:5</td>--}}
            {{--<td>2:5</td>--}}
            {{--<td>3:5</td>--}}
            {{--<td>4:5</td>--}}
            {{--<td>5:5</td>--}}
        {{--</tr>--}}
    {{--</table>--}}
    {{--<script>--}}
        {{--// let table = document.body.firstElementChild;--}}
        {{--// for (let i = 0; i < table.rows.length; i++) {--}}
        {{--//     let tb = table.rows[i];--}}
        {{--//     tb.cells[i].style.backgroundColor = 'red';--}}
        {{--// }--}}
        {{--// let elem = document.getElementById('get');--}}
        {{--sago.style.background = 'red';--}}
        {{--let elements = document.querySelector('tr > td:last-child');--}}
        {{--for (let elem of elements) {--}}
            {{--alert(elem.innerHTML);--}}
        {{--}--}}
    {{--</script>--}}

{{--<a href="http://example.com/file.zip">...</a>--}}
{{--<a href="http://ya.ru">...</a>--}}

{{--<script>--}}
    {{--// может быть любая коллекция вместо document.body.children--}}
    {{--for (let elem of document.body.children) {--}}
        {{--if (elem.matches('a[href$="zip"]')) {--}}
            {{--alert("Ссылка на архив: " + elem.href );--}}
        {{--}--}}
    {{--}--}}
{{--</script>--}}
{{--</div>--}}
{{--<form name="search">--}}
    {{--<label>Search the site:--}}
        {{--<input type="text" name="search">--}}
    {{--</label>--}}
    {{--<input type="submit" value="Search!">--}}
{{--</form>--}}

{{--<hr>--}}

{{--<form name="search-person">--}}
    {{--Search the visitors:--}}
    {{--<table id="age-table">--}}
        {{--<tr>--}}
            {{--<td>Age:</td>--}}
            {{--<td id="age-list">--}}
                {{--<label>--}}
                    {{--<input type="radio" name="age" value="young">less than 18</label>--}}
                {{--<label>--}}
                    {{--<input type="radio" name="age" value="mature">18-50</label>--}}
                {{--<label>--}}
                    {{--<input type="radio" name="age" value="senior">more than 50</label>--}}
            {{--</td>--}}
        {{--</tr>--}}

        {{--<tr>--}}
            {{--<td>Additionally:</td>--}}
            {{--<td>--}}
                {{--<input type="text" name="info[0]">--}}
                {{--<input type="text" name="info[1]">--}}
                {{--<input type="text" name="info[2]">--}}
            {{--</td>--}}
        {{--</tr>--}}

    {{--</table>--}}

    {{--<input type="submit" value="Search!">--}}
{{--</form>--}}

{{--<script>--}}
    {{--// alert(window['age-table'].innerHTML);--}}
    {{--// for (let element of document.querySelectorAll('td > label')) {--}}
    {{--//     alert(element);--}}
    {{--// }--}}
    {{--// alert(document.querySelector('td').innerHTML);--}}
    {{--// alert(search.innerHTML);--}}
    {{--alert(search.querySelector('input:last-child'));--}}
{{--</script>--}}
{{--<div id="elem">Мигающий элемент</div>--}}

{{--<script>--}}
    {{--// setInterval(() => elem.hidden = !elem.hidden, 1000);--}}
    {{--alert(!elem.hidden);--}}
{{--</script>--}}

</body>
</html>