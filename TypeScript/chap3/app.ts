import { Book } from './book';

let book = new Book;

book.name = "L'île Mistérieuse";

console.log(book.name);

//Pour compiler le code, exécuter: tsc app.ts --target ES5 --module commonjs
//