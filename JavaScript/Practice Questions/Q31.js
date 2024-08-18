//Write a Java Script program to generate a random number and store it in a Variable. The program then takes an input from the user to tell them whether the guess was Correct,greater or lesser than the original number. 100 - (no of guesses) is the score of the user. The program is expected to terminate once the number is guessed. Number should be between 1-100
// Generate a random number between 1 and 100
const randomNumber = Math.floor(Math.random() * 100) + 1;
let guesses = 0;
let guessedCorrectly = false;

while (!guessedCorrectly) {
    // Take input from the user
    const userGuess = parseInt(prompt("Guess a number between 1 and 100:"), 10);
    guesses++;

    if (userGuess === randomNumber) {
        alert(`Correct! You guessed the number in ${guesses} attempts. Your score is ${100 - guesses}.`);
        guessedCorrectly = true;
    } else if (userGuess > randomNumber) {
        alert("Your guess is greater than the number. Try again!");
    } else if (userGuess < randomNumber) {
        alert("Your guess is lesser than the number. Try again!");
    } else {
        alert("Please enter a valid number.");
    }
}
