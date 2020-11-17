class Recipe {
    _name: string;
    _star?: number;

    constructor(name: string, star: number | null = null) {
        this._name = name;
        this._star = star;
    }

    get name(): string {
        return this._name;
    }
    set name(name: string) {
        this._name = name;
    }

    get star(): number | null {
        return this._star;
    }
    set star(star: number | null) {
        this._star = star;
    }
}

let oeufMimosa = new Recipe('oeuf mimosa', 4);
let poivronFarci = new Recipe('poivron farci');
let chiliSinCarne = new Recipe('chili sin carne', 5);

let recipes: Recipe[] = [oeufMimosa, poivronFarci, chiliSinCarne];

recipes.forEach(r => {
    console.log(`recette : ${r.name} ; score: ${r.star}`);
});