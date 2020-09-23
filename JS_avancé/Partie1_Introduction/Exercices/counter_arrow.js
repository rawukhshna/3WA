const CounterV1 = {
    count: 0,
    counter: function counter() {
        setInterval(() => {
            this.count++; //prend le 'this.count' du contexte de définition de la fonction car on est dans une fonction fléchée;
            console.log(this.count);
        }, 1000);
    }
};

CounterV1.counter();