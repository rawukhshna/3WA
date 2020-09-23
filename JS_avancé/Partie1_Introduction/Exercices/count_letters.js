

const countLetters = (w) => {
    const word = [...w];
    const letters = new Set(word);
    const result = {};

    //Ma solution
    /*
    for(letter of letters) {
        result[letter] = word.filter( w => w === letter).length;
        
    }
    console.log(result);
    */

    
    for(const letter of letters){
        // préparer la chaîne de caractères dynamique dans match
        // le paramètre g facultatif permet de chercher sur toute la chaîne de caractères
        const re = new RegExp(letter, 'g'); 
        result[letter]= w.match(re).length;
    }
    console.log(result);
}
const word1 = "Mississipi";

countLetters(word1);