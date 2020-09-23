const populations = [
    { "id" : 0, "name" : "Alan" },
    { "id" : 1, "name" : "Albert" },
    { "id" : 2, "name" : "Jhon" },
    { "id" : 3, "name" : "Brice" },
    { "id" : 4, "name" : "Alexendra" },
    { "id" : 5, "name" : "Brad" },
    { "id" : 6, "name" : "Carl" },
    { "id" : 7, "name" : "Dallas" },
    { "id" : 8, "name" : "Dennis" },
    { "id" : 9, "name" : "Edgar" },
    { "id" : 10, "name" : "Erika" },
    { "id" : 11, "name" : "Isaac" },
    { "id" : 12, "name" : "Ian" }
];

populations.sort( (a,b) => a.name.length - b.name.length);


//for(pop of populations) {
//    let lenName = {"lenName" : pop.name.length};
//    Object.assign(pop, lenName);
//
//}

//correction
for (const population of populations) {
    population['lenName'] =  ( population.name && population.name.length || null ) ;
    // le && passif: JS n'évalue pas le second élément si le premier est faux, donc ici si popuplation.naem n'existe pas, null est affecté ) lenName;
}

//console.log(populations);

const lenNames = new Set(populations.map(pop => pop.lenName));
const groupNames = [];

for(const lenName of lenNames) {

    groupNames.push(populations.filter(p => p.lenName === lenName));
}
console.log(groupNames);

// Faire une copie profonde (sans les références) d'un tableau d'objets
const nPopulations = populations.map( pop => ({ ...pop}));

nPopulations[0].name = "IAN";
console.log(nPopulations);
console.log(populations);