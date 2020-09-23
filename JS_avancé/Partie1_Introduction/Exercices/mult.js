let numbers = [7, 9, 10, 1, 2, 3, 71, 8 ];

numbers2 = numbers.map( number => (number % 2 == 0 && number*3) || number*5);

console.log(numbers2);