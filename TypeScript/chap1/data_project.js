// définition de la classe
var Product1 = /** @class */ (function () {
    function Product1(name, ref) {
        this._name = name; // setter assigne une valeur à l'attribut _name
        this._ref = ref;
    }
    Object.defineProperty(Product1.prototype, "name", {
        // getter afficher une valeur dans le code courant
        get: function () {
            return this._name;
        },
        // setter
        set: function (name) {
            this._name = name;
        },
        enumerable: false,
        configurable: true
    });
    Object.defineProperty(Product1.prototype, "ref", {
        // getter afficher une valeur dans le code courant
        get: function () {
            return this._ref;
        },
        // setter
        set: function (ref) {
            this._name = name;
        },
        enumerable: false,
        configurable: true
    });
    return Product1;
}());
// instance de la classe
var bike2 = new Product1('Super Bike', 2);
bike2.name = 'new super bike';
console.log(bike2.name);
