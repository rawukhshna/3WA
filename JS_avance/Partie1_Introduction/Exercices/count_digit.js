const phrase = '8790:bonjour le monde:8987:7777:Hello World:9007';

const words = phrase.split(':');
const result = [];

for (const word of words) {
    if(!isNaN(word)) result.push(word);
}

console.log(result);

//correction 
result2 = phrase.split(':').filter(Number);
console.log(result2);