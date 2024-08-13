//function
function greet() {
    console.log("Hello, World!");
}

greet();

//arrow function

const add = (x, y, z) => {
    return x + y + z;
}

x = Number(prompt("Enter the value of x"));
y = Number(prompt("Enter the value of y"));
z = Number(prompt("Enter the value of z"));

sum = add(x, y, z);
console.log("Sum of x , y, z is "+sum);

//