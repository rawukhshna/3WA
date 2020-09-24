const fs = require('fs');

const dragon = (file) => (new Promise((resolve, reject) => {
    fs.readFile( file, { encoding: 'utf8' }, (err, data) => {
        if (err) {
            reject("File read failed:", err);
            return;
        }
        resolve(data);
    });
}));

dragon('./data/dragons.json')
    .then(data => console.log('File data:', JSON.parse(data)) )
    .catch(err => console.log( err));