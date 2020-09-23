class Rectangle {

    constructor(l,h) {
        this._l = l;
        this._h = h;
    }

    get l() {
        return this._l;
    }

    get h() {
        return this._h;
    }

    set l(l) {
        this._l = l;
    }

    set h(h) {
        this._h = h;
    }

    dim() {
        return (this._l + this._h) * 2;
    }

    area() {
        return this._l * this._h;
    }

}

class Square extends Rectangle{

    constructor(l){
        super(l,l);
        
    }
}

let rec1 = new Rectangle(5,3);
let square1 = new Square(5);

console.log(rec1.area());

console.log(square1.dim());