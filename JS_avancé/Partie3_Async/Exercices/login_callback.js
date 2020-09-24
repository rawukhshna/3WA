//EXEMPLE CALLBACK

function calcul(x, y, callback){

    return callback(x, y);
}

console.log(calcul(2, 3, (x,y) => x + y));




//EXERCICE LOGIN CALLBACK

const login = (email, password, callback ) => {
    setTimeout(() => {

        
    }, 1000);
}

const email = login('alan@alan.fr', 1234567890);