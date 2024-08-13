let str = "JavaScript";
console.log(str[0]); // Output: J
console.log(str[4]); // Output: S


let firstName = "John";
let lastName = "Doe";
let fullName = firstName + " " + lastName;
console.log(fullName); // Output: John Doe
// Using concat() method
let fullNameConcat = firstName.concat(" ", lastName);
console.log(fullNameConcat); // Output: John Doe


let greeting = "Hello";
let name = "Alice";
let message = `${greeting}, ${name}!`; // Template literal
console.log(message); // Output: Hello, Alice!

let longText = "    JavaScript is a versatile language.    ";
console.log(longText.trim()); // Output: "JavaScript is a versatile language."

let sentence = "The quick brown fox jumps over the lazy dog.";
console.log(sentence.toUpperCase()); // Output: THE QUICK BROWN FOX JUMPS OVER THE LAZY DOG.

console.log(sentence.indexOf("fox")); // Output: 16

let words = sentence.split(" ");
console.log(words); // Output: ["The", "quick", "brown", "fox", "jumps", "over", "the", "lazy", "dog."]

let newSentence = sentence.replace("dog", "cat");
console.log(newSentence); // Output: The quick brown fox jumps over the lazy cat.
