const fs = require('fs');

// 1 ) 
const getFiles = (file) => (new Promise((resolve, reject) => {
    fs.readFile( file, { encoding: 'utf8' }, (err, data) => {
        if (err) {
            reject("File read failed:", err);
            return;
        }
        resolve(data);
    });
}));

getFiles('./data/dragons.json')
    .then(data => console.log('File data:', JSON.parse(data)) )
    .catch(err => console.log( err));

// 2 )

getFiles('./data/dragons.json')
    .then(data => {
        const dragonsList = JSON.parse(data);
 
        const dragonsDSC = dragonsList.dragons.sort((a,b) => b.age - a.age)
    
        const oldestDragon = dragonsDSC[0]

        console.log(`Le plus vieux dragon est ${oldestDragon.name}(${oldestDragon.age} ans).`)
// 3
        const youngestDragon = dragonsDSC[dragonsDSC.length -1]
    
        console.log(`Le plus jeune dragon est ${youngestDragon.name} (${youngestDragon.age} ans).`)

// 4
        console.log(dragonsDSC);
        
    })
    .catch(err => console.log( err));

/// RELATIONSHIPS
const dragonsList = './data/dragons.json';
const relationships = './data/relationships.json';
Promise.all(dragonsList, relationships)
    .then( data => {
        console.log(getFiles(dragonsList))
        console.log(getFiles(relationships))
    })