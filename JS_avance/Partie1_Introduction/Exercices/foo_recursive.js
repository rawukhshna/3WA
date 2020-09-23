function foo(count = 10){

    if( count == 0 ) return "Stop" ; 

    count = count - 1 ;
    console.log(count);

    // count--;
    foo(count);

}
foo();
