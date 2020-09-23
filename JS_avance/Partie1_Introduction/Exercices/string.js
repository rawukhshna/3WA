


const message = "Bonjour tout le monde, vive JS !";

const array = message
                    .replace(/,/g , '') // remplace toutes les virgules (g pour général) par rien 
                    .split(' ') 
                    .filter(w => ['.', '!', '...', ','] 
                    .includes(w) === false) // enlève les ponctuations 
                    .map(w => w.length);

console.log(array);

//interpolation : à la place de la concaténation classique avec '+' de strings et de variables ou de fonctions, il est possible de faire :
console.log( `Bonjour! Il est ${ (new Date).toDateString() } !` );