

//multidimention arrays
let matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];
console.log(matrix[1][2]); // Output: 6

//methods
let fruits = ["Apple", "Banana", "Orange"];
console.log("Original array:", fruits);

fruits.push("Grapes");
console.log("After push:", fruits);

fruits.pop();
console.log("After pop:", fruits);

fruits.shift();
console.log("After shift:", fruits);

fruits.unshift("Strawberry");
console.log("After unshift:", fruits);

let citrus = fruits.slice(1, 3);
console.log("Slice result:", citrus);

fruits.splice(1, 1, "Mango", "Pineapple");
console.log("After splice:", fruits);

let fruitString = fruits.join(", ");
console.log("Joined string:", fruitString);

let reversed = fruits.reverse();
console.log("Reversed array:", reversed);

let sorted = fruits.sort();
console.log("Sorted array:", sorted);
