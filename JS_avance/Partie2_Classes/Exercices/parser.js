class Parser {

    constructor(split) {
        this._split = split;
        this._str = 0;
    }

    //setters
    set split(split) {
        this._split = split;
    }

    set str(str) {
        this._str = str;
    }

    //getters
    get split() {
        return this._split;
    }

    get str() {
        return this._str;
    }

    //méthodes
    parse (phrase) {
        this._str = phrase.split(this._split).filter(Number).map(str => str.trim());
    }
}

const phrase = '8790: bonjour le monde:8987:7777:Hello World:    9007';
const p = new Parser(':');
p.parse(phrase);
console.log(p.str);
