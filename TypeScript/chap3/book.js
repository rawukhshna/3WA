"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.Book = void 0;
var Book = /** @class */ (function () {
    function Book() {
    }
    Object.defineProperty(Book.prototype, "name", {
        get: function () { return this._name; },
        set: function (name) { this._name = name; },
        enumerable: false,
        configurable: true
    });
    return Book;
}());
exports.Book = Book;
