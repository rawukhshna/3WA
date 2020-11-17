// Importez les bons fichiers et définition et une fois que vous avez récupérez tous les products mappez ce dernier 
// pour extraire uniquement les produits dont l'option delivery est "special"
import { Details, Delivery, MockDelivery, MockDetails } from './data/MockProducts';
import { Product } from './Product';


let products: Array<Product<Details, Delivery>> = [];

MockDetails.forEach(details => {

    let delivery = MockDelivery.find(x => x.id == details.id);
    products.push(new Product(details, delivery.delivery));

});

console.log(products.filter(x => x.option == Delivery.Special));