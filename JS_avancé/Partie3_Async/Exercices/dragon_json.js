const fs = require('fs');

const readJSON = fileName => {
    return new Promise(
        (resolve, reject) => {
            fs.readFile(fileName, { encoding: 'utf8' },
                (err, data) => {
                    if (err) {
                        reject(new Error(err));
                    } else {
                        resolve(JSON.parse(data));
                    }
                });
        }
    );
}


// 2 et 3

readJSON('./data/dragons.json')
    .then( data  => {
        const { dragons } = data;

        dragons.sort( (a, b) => a.age - b.age )

        const youngest = dragons[0];
        const oldest = dragons[dragons.length];

        return { 
            youngest, 
            oldest,
            dragons
        }
    })
    .then(data => console.log(data))

// 2 correction avancée
// readJSON('./data/dragons.json')
//     .then(({ dragons }) => {

//         const maxAge = Math.max(...[...dragons.map(dragon => (dragon.age))]);
//         const minAge = Math.min(...[...dragons.map(dragon => (dragon.age))]);

//         const { age: oldestAge, name: oldestName } = dragons.filter(d => d.age === maxAge)[0];
//         const { age: youngestAge, name: youngestName } = dragons.filter(d => d.age === minAge)[0];

//         return {
//             oldest: { age: oldestAge, name: oldestName },
//             youngest: { age: youngestAge, name: youngestName }
//         }
//     })
//     .then(data => console.log(data))
