function sumTTC( price1, price2, price3, tva = 1.2){

    return (price1 + price2 + price3)*tva;
}

const pricesHT = [100, 200, 55];

console.log(sumTTC( ...pricesHT));