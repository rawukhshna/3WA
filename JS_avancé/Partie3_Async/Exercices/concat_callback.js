const TIME = 500;

const concat_str = (str, callback) => {
    setTimeout(() => {
        callback(str);
    }, TIME);
}


concat_str('Hello', message1 => {

    concat_str(`${message1} World!`, message2 => {

        console.log(message2);
    })
})