<?php

// Indexed Array
echo "Indexed Array <br>";
// Method 1: Using array() function
$fruit1 = array("Apple", "Banana", "Orange");
// Method 2: Using short array syntax 
$fruit2 = ["Mango", "Pineapple", "Kiwi"];

// Access elements by index
echo $fruit1[0]."<br>"; // Outputs: Apple
echo $fruit1[1]."<br>"; // Outputs: Banana
echo $fruit1[2]."<br>"; // Outputs: Orange

// Output the array
echo print_r($fruit2)."<br>";
echo "<br>";


//Associative Array
echo "Associative Array <br>";
// Method 1: Using array() function
$age1 = array("Rohit" => 35, "Parth" => 22, "James" => 39);
// Method 2: Using short array syntax 
$age2 = ["Rahul" => 25, "Rocky" => 37, "Jone" => 33];

// Access elements by key
foreach ($age2 as $key => $value) {
    echo "$key = $value<br>";

}

// Output the array
echo print_r($age1)."<br>";


//Multidimensional Array
echo "<br> Multidimensional Array <br>";
echo "<br>";
echo "Multidimensional Array - Indexed <br>";
// Indexed multidimensional array
$products = [
    ["Laptop", 10000, 5],
    ["Mobile", 5000, 10],
    ["Tablet", 7500, 8]
];
echo "<br>";

// Output the arrays
for ($i=0; $i <count($products) ; $i++) { 
    for ($j=0; $j <count($products) ; $j++) { 

        echo $products[$i][$j]." ";
    }
    echo "<br>";
}
echo "<br>";

// Accessing elements in an indexed multidimensional array
echo $products[0][2]."<br>"; // Outputs: Laptop
echo $products[1][1]."<br>"; // Outputs: 500
echo $products[2][0]."<br>"; // Outputs: 8

echo "<br>";
echo "Multidimensional Array - Associative <br>";
echo "<br>";

// Associative multidimensional array
$contacts = [
    "John" => ["email" => "john@example.com", "phone" => "123-456-7890"],
    "Jane" => ["email" => "jane@example.com", "phone" => "098-765-4321"]
];

// Output the arrays
echo print_r($contacts)."<br>";
echo "<br>";

// Accessing elements in an associative multidimensional array
echo $contacts["John"]["email"]."<br>"; // Outputs: john@example.com
echo $contacts["Jane"]["phone"]."<br>"; // Outputs: 098-765-4321

?>