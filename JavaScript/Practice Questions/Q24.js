//2) create an array of square of given number
numbers = [2,3,4,5,6,7];
console.log("Array of numbers:", numbers)

// Function to create an array of squares
function createSquaresArray(numbers) {
    let squares = [];
    for (let i = 0; i < numbers.length; i++) {
        squares.push(numbers[i] **2); // Square each number and add to the squares array
    }
    return squares;
}

// Call the function to get the array of squares
let squaresArray = createSquaresArray(numbers);

// Display the array of squares
console.log("Array of squares:", squaresArray);
