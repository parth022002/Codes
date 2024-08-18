//1) create an array of numbers and take input from the user to add numbers to this array
// Initialize an empty array to store numbers
let numbers = [];

// Function to add numbers to the array
function addNumbers() {
    let num;
    do {
        // Prompt user to enter a number (input is converted to a number type)
        num = Number(prompt("Enter a number to add to the array (or type 'stop' to finish):"));
        
        // Check if the input is a valid number
        if (!isNaN(num)) {
            numbers.push(num); // Add the number to the array
        }
    } while (!isNaN(num)); // Continue until a non-number input (e.g., "stop") is given
}

// Call the function to take user input
addNumbers();

// Display the array of numbers
console.log("Array of numbers:", numbers);
