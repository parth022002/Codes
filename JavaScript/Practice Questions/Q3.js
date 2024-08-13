//Get user to input a number using prompt(“Enter a number:”). Check if the number is a multiple of 5 or not.

// Prompt the user to enter a number
let number = prompt("Enter a number:");

// Convert the input to a number (in case the user enters a string)
number = Number(number);

// Check if the number is a multiple of 5
if (number % 5 === 0) {
    console.log("The number " + number + " is a multiple of 5.");
} else {
    console.log("The number " + number + " is not a multiple of 5.");
}
