//use reduce to calculate factorials of a given number from an array of first n natural numbers (n being the number whose factorial needs to be calculated)

// Function to calculate factorial using reduce
function calculateFactorial(n) {
    // Create an array of the first n natural numbers
    let numbers = Array.from({ length: n }, (_, i) => i + 1);
    
    // Use reduce to calculate the factorial
    let factorial = numbers.reduce((acc, current) => acc * current, 1);
    
    return factorial;
}

// Example: Calculate the factorial of 5
let n = Number(prompt("Enter the number"));
let result = calculateFactorial(n);
console.log(`Factorial of ${n} is:`, result);
