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

Promise.all([readJSON('./data/dragons.json'), readJSON('./data/relationships.json')])
    .then(data => {

        const { dragons } = data[0];
        const { relationships } = data[1];

        //console.log(dragons);
        console.log(relationships);

       

        let dragonRelations = [];
        for(relationship of relationships) {
            
            let dragon = dragons.filter(dragon => dragon.id === relationship.id).shift().name;
            
            let relations = [];
            //console.log(relationship.relation)
            for (relation of relationship.relation){
                relations.push(dragons.filter(dragon => dragon.id === relation).shift().name);
                //console.log(dragon.name);

                
            }
            dragonRelations.push({dragon, relations});

        }
        console.log(dragonRelations);

    })