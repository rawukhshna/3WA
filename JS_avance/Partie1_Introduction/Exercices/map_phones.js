const phones  = [
    { name:'iphone XX', priceHT:900 },
    { name:'iphone X', priceHT:700 },
    { name:'iphone B', priceHT:200 }
  ];

  const TVA = .2;
  const phonesPriceTTC = phones.map( phone => phone.priceHT * (1 + TVA) );

  