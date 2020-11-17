var Product = /** @class */ (function () {
    function Product(name) {
        this._ref = 1000;
        this._name = name;
    }
    Object.defineProperty(Product.prototype, "name", {
        get: function () {
            return this._name;
        },
        set: function (name) {
            this._name = name;
        },
        enumerable: false,
        configurable: true
    });
    return Product;
}());
var bike = new Product('Super Bike');
console.log(bike.name);
