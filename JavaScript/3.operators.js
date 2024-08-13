/* The code snippet you provided demonstrates various types of operators in JavaScript and their
functionalities. Here is a breakdown of what each section does: */
// Arithmetic Operators
let a = 10;
let b = 3;
console.log('Addition:', a + b);    // 13
console.log('Subtraction:', a - b); // 7
console.log('Multiplication:', a * b); // 30
console.log('Division:', a / b);    // 3.333...
console.log('Modulus:', a % b);     // 1

// Assignment Operators
let x = 10;
x += 5;  // x = x + 5
console.log('x += 5:', x);  // 15

// Comparison Operators
console.log('10 == "10":', 10 == "10");  // true
console.log('10 === "10":', 10 === "10"); // false
console.log('10 > 5:', 10 > 5); // true

// Logical Operators
console.log('true && false:', true && false); // false
console.log('true || false:', true || false); // true
console.log('!true:', !true); // false

// Ternary Operator
let isEven = (a % 2 === 0) ? 'Even' : 'Odd';
console.log('Ternary Operator:', isEven); // Even

// Type Operators
console.log('typeof 42:', typeof 42); // number
console.log('typeof "Hello":', typeof "Hello"); // string

// String Operators
let hello = "Hello";
let world = "World";
console.log('Concatenation:', hello + " " + world); // Hello World

// Unary Operators
let c = 5;
console.log('Unary plus:', +c); // 5
console.log('Unary minus:', -c); // -5
console.log('Increment:', ++c); // 6
console.log('Decrement:', --c); // 5

// Comma Operator
let result = (a = 1, b = 2, a + b);
console.log('Comma Operator Result:', result); // 3
