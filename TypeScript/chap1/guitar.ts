abstract class Music {
    protected _instruments: string;
    abstract makeSound(): string;
    play(): string {
        return "play music";
    }

    get instruments(): string {
        return this._instruments;
    }
}

//classe étendue
class Guitar extends Music {
    protected _instruments = "guitar";

    makeSound() {
        return "*guitar noises*";
    }
}

let guitar = new Guitar();

console.log(guitar.instruments + " makes the sound: " + guitar.makeSound());