let age = 22;
let hasDrivingLicense = true;
let isHealthy = true;

// if...else if...else statement
if (age >= 18) {
    console.log("You are an adult.");

    // Nested if statement
    if (hasDrivingLicense) {
        console.log("You can drive.");
    } else {
        console.log("You need a driving license to drive.");
    }
} else {
    console.log("You are a minor.");
}

// Ternary operator
let canVote = (age >= 18) ? "You can vote." : "You cannot vote.";
console.log(canVote);

// switch statement
let grade = 'F';
switch (grade) {
    case 'A':
        console.log("Excellent!");
        break;
    case 'B':
        console.log("Well done.");
        break;
    case 'C':
        console.log("Good.");
        break;
    case 'D':
        console.log("You passed.");
        break;
    case 'F':
        console.log("Better luck next time.");
        break;
    default:
        console.log("Invalid grade.");
}

// if...else with logical operators
if (age >= 18 && isHealthy) {
    console.log("You are eligible to donate blood.");
} else {
    console.log("You are not eligible to donate blood.");
}
