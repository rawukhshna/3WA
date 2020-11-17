interface Duck {
    name: string;
    swim(): string;
}

class Thing implements Duck {
    name: string;

    swim(): string {
        return "Nage comme un canard";
    }
}

let thing = new Thing();
console.log(thing.swim());