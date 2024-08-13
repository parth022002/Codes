// JavaScript Data Types Example

// 1. Primitive Data Types

// Number
let age = 25;
let price = 19.99;
console.log('Number:', age, price);

// String
let name = "John Doe";
let greeting = 'Hello, World!';
console.log('String:', name, greeting);

// Boolean
let isLoggedIn = true;
let hasAccess = false;
console.log('Boolean:', isLoggedIn, hasAccess);

// Undefined
let something;
console.log('Undefined:', something);

// Null
let selectedItem = null;
console.log('Null:', selectedItem);

// Symbol
let sym = Symbol("uniqueIdentifier");
console.log('Symbol:', sym);

// BigInt
let bigNumber = 1234567890123456789012345678901234567890n;
console.log('BigInt:', bigNumber);

// 2. Object Data Types

// Object
let person = {
    name: "Alice",
    age: 30,
    isEmployed: true
};
console.log('Object:', person);

// Array
let numbers = [1, 2, 3, 4, 5];
let fruits = ["apple", "banana", "cherry"];
console.log('Array:', numbers, fruits);

// Function
function greet() {
    console.log("Hello, World!");
}
console.log('Function:', greet);
greet(); // Call the function

// Date
let currentDate = new Date();
console.log('Date:', currentDate);

// RegExp
let regex = /hello/i;
let result = regex.test("Hello, World!");
console.log('RegExp:', regex, 'Test Result:', result);

// 3. Type Conversion

// Implicit Conversion
let x = "5" + 2;  // "52" (string)
let y = "5" * 2;  // 10 (number)
console.log('Implicit Conversion:', x, y);

// Explicit Conversion
let str = "123";
let num = Number(str);  // Converts string to number
console.log('Explicit Conversion:', str, num);

// 4. Checking Data Types
console.log('Type of 42:', typeof 42);
console.log('Type of "hello":', typeof "hello");
console.log('Type of true:', typeof true);
console.log('Type of undefined:', typeof undefined);
console.log('Type of null:', typeof null); // Note: typeof null returns "object"
console.log('Type of {name: "John"}:', typeof { name: "John" });
