
// deux fonctions de callback : callback et error
const add = (number, callback, error) => {
    setTimeout(() => {
        if(isNaN(parseInt(number))){
            throw 'not a number';
        }
        callback(number);
    }, 1000);
}

// premier appel de la fonction add
add(1, number => { 
    try {

        let sum = number;
        
        add(2, number => { 
            try {
                sum += number;
        
                console.log(`sum : ${sum}`);
            
            } catch (e) {
                console.error(e);
            }
        }
        
    } catch (e) {
        console.error(e);
    }
});
