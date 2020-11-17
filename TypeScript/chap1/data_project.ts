// définition de la classe
class Product1 {
    private _name: string; // privé dans la classe actuelle
    protected _ref: number;

    constructor(name: string, ref: number) {
        this._name = name; // setter assigne une valeur à l'attribut _name
        this._ref = ref;
    }

    // setter
    set name(name: string) {
        this._name = name;
    }

    // getter afficher une valeur dans le code courant
    get name(): string {
        return this._name;
    }

    // setter
    set ref(ref: number) {
        this._name = name;
    }

    // getter afficher une valeur dans le code courant
    get ref(): number {
        return this._ref;
    }

}

// instance de la classe
let bike2 = new Product1('Super Bike', 2);
bike2.name = 'new super bike';
console.log(bike2.name);



