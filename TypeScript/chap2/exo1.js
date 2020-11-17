var Queue = /** @class */ (function () {
    function Queue() {
        this._array = [];
    }
    Queue.prototype.push = function (a) {
        this._array.push(a);
    };
    Queue.prototype.pop = function () {
        return this._array.shift();
    };
    return Queue;
}());
var queue = new Queue();
queue.push(1);
queue.push(2);
queue.push(3);
queue.push(4);
console.log(queue.pop());
var queueArray = new Queue();
queueArray.push([1, 2]);
queueArray.push([3, 4]);
queueArray.push([5, 6]);
queueArray.push([7, 8]);
console.log(queueArray.pop());
