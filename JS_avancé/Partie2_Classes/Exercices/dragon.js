class Player {

    constructor(force,life,name) {

        this._force = force;
        this._life = life;
        this._shot = 0;
        this._name = name;
    }

    get force() {
        return this._force;
    }

    get life() {
        return this._life;
    }

    get shot() {
        return this._shot;
    }

    get name() {
        return this._name;
    }

    set force(force) {
        this._force = force;
    }

    set life(life) {
        this._life = life;
    }

    set shot(shot) {
        this._shot = shot;
    }

    set name(name) {
        this._name = name;
    }

    hit() {
        return Math.floor(Math.random() * Math.floor(this._force)); //retourne une valeur (points de dégâts) entre 0 et le montant de la force de l'attaquant
    }
}

class Knight extends Player {
}

class Dragon extends Player {
}

class Game {
    constructor(p1, p2) {
        this._p1 = p1;
        this._p2 = p2;
    }

    get p1() {
        return this._p1;
    }

    get p2() {
        return this._p2;
    }

    set p1(p1) {
        this._p1 = p1;
    }

    set p2(p2) {
        this._p2 = p2;
    }

    run() {
        let round = 1;

        let turnToHit;

        while(this._p1.life > 0 && this._p2.life > 0) {

            turnToHit = Math.floor(Math.random() * Math.floor(2)); //détermine qui inflige les dégâts
            
            switch(turnToHit) {

                case 0 : 
                    
                    this._p1.life -= this._p2.hit();
                    this._p2.shot ++;
                    
                    break;

                case 1 : 
                    
                    this._p2.life -= this._p1.hit();
                    this._p1.shot ++;
                    
                    break;
            }

            round ++;
        }

        if(this._p1.life <= 0) {

            console.log(`Victoire de ${this._p2.name} en ${this._p2.shot} coups!`);

        } else {
            console.log(`Victoire de ${this._p1.name} en ${this._p1.shot} coups!`);
        }
    }
    
}

const knight = new Knight(50, 200, 'Marty');
const dragon = new Dragon(80, 200, 'Doc');

const game = new Game(knight, dragon);

game.run();