//Create a function using the “function” keyword that takes a String as an argument & returns the number of vowels in the string.


function countVowels(str) {
    console.log(str);
    const vowels = ['a', 'e', 'i', 'o', 'u'];
    let count = 0;
    for (let i = 0; i < str.length; i++) {
        if (vowels.includes(str[i].toLowerCase())) {
            count++;
        }
    }
    return count;
}

str = prompt("Enter the string..")

console.log(countVowels(str));
