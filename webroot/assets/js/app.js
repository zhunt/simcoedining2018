// app.js

let hello = () => {
    console.log('Hello');
};

let sum = (a,b) => { return a + b; };

let prod = (a,b) => { return a*b; };

console.log(`sum: ${sum(1,2)} `);
console.log(`product: ${prod(1,2)} `);

// console.log(`product: ${prod(2,2)} `);

const var1 = [1,2,3];

let var2 = [...var1].splice(',');

console.log(var2);
