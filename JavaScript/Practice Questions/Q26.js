//write a program to change the url to google.com (redirect) if the user enters a number greater than 4

// Function to prompt the user for a number and redirect if the number is greater than 4
function checkNumberAndRedirect() {
    // Prompt the user to enter a number
    let number = Number(prompt("Enter a number:"));

    // Check if the number is greater than 4
    if (number > 4) {
        // Redirect to google.com if the condition is met
        window.location.href = "https://www.google.com";
    } else {
        console.log(`The number ${number} is not greater than 4. No redirection.`);
    }
}

// Call the function
checkNumberAndRedirect();
