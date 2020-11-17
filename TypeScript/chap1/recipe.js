var Recipe = /** @class */ (function () {
    function Recipe(name, star) {
        if (star === void 0) { star = null; }
        this._name = name;
        this._star = star;
    }
    Object.defineProperty(Recipe.prototype, "name", {
        get: function () {
            return this._name;
        },
        set: function (name) {
            this._name = name;
        },
        enumerable: false,
        configurable: true
    });
    Object.defineProperty(Recipe.prototype, "star", {
        get: function () {
            return this._star;
        },
        set: function (star) {
            this._star = star;
        },
        enumerable: false,
        configurable: true
    });
    return Recipe;
}());
var oeufMimosa = new Recipe('oeuf mimosa', 4);
var poivronFarci = new Recipe('poivron farci');
var chiliSinCarne = new Recipe('chili sin carne', 5);
var recipes = [oeufMimosa, poivronFarci, chiliSinCarne];
recipes.forEach(function (r) {
    console.log("recette : " + r.name + " ; score: " + r.star);
});
