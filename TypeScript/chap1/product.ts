class Product {
    private _name: string;
    protected _ref: number = 1000;

    constructor(name: string) {
        this._name = name;
    }

    set name(name: string) {
        this._name = name;
    }

    get name(): string {
        return this._name;
    }
}

let bike = new Product('Super Bike');

console.log(bike.name);