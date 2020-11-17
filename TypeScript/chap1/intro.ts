let str: string = '';
let arr: number[] = [1, 2, 3];

class User {
    id: number | string;
}

function showNumberOrString(user: User): number | string {
    return user.id;
}

let message: any = "this is a string";
let n: number = (<string>message).length;

//console instructions:
//tsc data_project.ts --target es5
//node data_project.js