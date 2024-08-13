//Prompt the user to enter their full name. Generate a username for them based on the input. Start username with @, followed by their full name and ending with the fullname length.

/* This JavaScript code prompts the user to enter their full name. It then processes the input to
generate a username for the user. Here's a breakdown of the code: */
let name = prompt("Enter your full name");
let words = name.trim().split(" "); // Split the name into an array of words
let fullName = words.join(''); // Join the words without spaces
let username = `@${fullName}${fullName.length}`;

alert(username)
