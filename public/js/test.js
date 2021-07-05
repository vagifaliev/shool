// describe('pow', function () {
//     function makeTest(x) {
//         let pos = x * x * x;
//         it(`${x} в степени 3 будет ${pos}`, function () {
//             assert.equal(pow(x, 3), pos);;;;;;;
//         });
//     }
//
//     for (x = 1; x <= 12; x++) {
//         makeTest(x);
//     }
// });
//
// describe('calculator', function () {
//     calculator.one = 5;
//     calculator.two = 5;
//     let sum = 5 + 5;
//     it(`Cумма двух значений 5 и 5 будет равна ${sum}`, function () {
//         assert.equal(calculator.sum(), sum);
//     });
//     let mul = calculator.one * calculator.two;
//     it(`Умножая ${calculator.one} на ${calculator.two} получим ${mul}`, function () {
//         assert.equal(calculator.mul(), mul);
//     });
// });
//
// describe('upperCase', function () {
//     let text = 'какашка';
//     it(`Делаем заглавной первую букву\nВ тексте ${text}:`, function () {
//         assert.equal(upperLetter(text), 'Какашка');
//     });
// });
// describe('porno', function () {
//     it('Проверка вхождения слова viagra и XXX', function () {
//         assert.equal(checkSpam('uuuuXviAgraafff'), true);
//         assert.equal(checkSpam('uuuuXxXafff'), true);
//     });
// })