const add = number => (new Promise((resolve, reject) => {
    setTimeout(() => {
        if(isNaN(parseInt(number))){
            reject(new Error('not a number'));
            return;
        }
        resolve(number);
    }, 500);
    })
);

add(0)
.then( number => add(1 + number))
.then( number2 => add(number2 + number))
.catch(err => console.error(err))
