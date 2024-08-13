//Create a game where you start with any random game number. Ask the user to keep guessing the game number until the user enters correct value.

/* This JavaScript code creates a simple number guessing game. Here's a breakdown of what the code
does: */
let randomNumber = Math.floor(Math.random() * 100) + 1;
let guess;
let guessCount = 0;

while (guess !== randomNumber) {
    guess = parseInt(prompt("Guess a number between 1 and 100:"));
    guessCount++;

    if (guess < randomNumber) {
        alert("Too low! Try again.");
    } else if (guess > randomNumber) {
        alert("Too high! Try again.");
    }
}

alert(`Congratulations! You guessed the number in ${guessCount} guesses.`);
