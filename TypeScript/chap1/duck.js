var Thing = /** @class */ (function () {
    function Thing() {
    }
    Thing.prototype.swim = function () {
        return "Nage comme un canard";
    };
    return Thing;
}());
var thing = new Thing();
console.log(thing.swim());
