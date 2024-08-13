// Using var
var age = 25;
console.log(age); // 25

// Using let
let name = "John";
console.log(name); // John

// Using const
const country = "USA";
console.log(country); // USA

// Block Scope
if (true) {
    let city = "New York";
    console.log(city); // New York
}
// console.log(city); // Error: city is not defined

// Function Scope
function greet() {
    var greeting = "Hello";
    console.log(greeting); // Hello
}
greet();
// console.log(greeting); // Error: greeting is not defined
