/*Create an array to store companies -> “Bloomberg”, “Microsoft”, “Uber”, “Google”, “IBM”, “Netflix”
a. Remove the first company from the array
b. Remove Uber & Add Ola in its place
c. Add Amazon at the end */

// Step 1: Create the array with the companies
let companies = ["Bloomberg", "Microsoft", "Uber", "Google", "IBM", "Netflix"];

// Step 2: Remove the first company ("Bloomberg")
companies.shift(); // Removes "Bloomberg"
console.log("After removing the first company:", companies);

// Step 3: Remove "Uber" & Add "Ola" in its place
let index = companies.indexOf("Uber"); // Find the index of "Uber"
if (index !== -1) {
    companies.splice(index, 1, "Ola"); // Replace "Uber" with "Ola"
}
console.log("After replacing Uber with Ola:", companies);

// Step 4: Add "Amazon" at the end
companies.push("Amazon"); // Adds "Amazon" at the end of the array
console.log("After adding Amazon at the end:", companies);


let companies2 = ["Bloomberg", "Microsoft", "Uber", "Google", "IBM", "Netflix"];
let idx = companies2.indexOf("Uber");
companies2.splice(idx, 1, "Ola");
companies2.shift();
companies2.push("Amazon");
console.log("Second way : ", companies2);
