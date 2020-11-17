"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
// Importez les bons fichiers et définition et une fois que vous avez récupérez tous les products mappez ce dernier 
// pour extraire uniquement les produits dont l'option delivery est "special"
const MockProducts_1 = require("./data/MockProducts");
const Product_1 = require("./Product");
let products = [];
MockProducts_1.MockDetails.forEach(details => {
    let delivery = MockProducts_1.MockDelivery.find(x => x.id == details.id);
    products.push(new Product_1.Product(details, delivery.delivery));
});
console.log(products.filter(x => x.option == MockProducts_1.Delivery.Special));
