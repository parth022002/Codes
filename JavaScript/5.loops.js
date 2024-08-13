//for loop 
for (let i = 0; i < 5; i++) {
    console.log("Iteration number:", i);
}
// Output: 0, 1, 2, 3, 4

//while loop
let i = 0;
while (i < 5) {
    console.log("Iteration number:", i);
    i++;
}
// Output: 0, 1, 2, 3, 4

//do-while loop
let j = 0;
do {
    console.log("Iteration number:", j);
    j++;
} while (j < 5);
// Output: 0, 1, 2, 3, 4

// for..in loop
const person = {name: "John", age: 30, city: "New York"};
for (let key in person) {
    console.log(key + ": " + person[key]);
}
// Output: 
// name: John
// age: 30
// city: New York

//for..of loop
const fruits = ["apple", "banana", "mango"];
for (let fruit of fruits) {
    console.log(fruit);
}
// Output: apple, banana, mango

//break
for (let i = 0; i < 5; i++) {
    if (i === 3) {
        break; // Exits the loop when i is 3
    }
    console.log("Iteration number:", i);
}
// Output: 0, 1, 2

//continue
for (let i = 0; i < 5; i++) {
    if (i === 3) {
        continue; // Skips the iteration when i is 3
    }
    console.log("Iteration number:", i);
}
// Output: 0, 1, 2, 4

