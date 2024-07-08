<?php
$string = "Hello World, New World.";
$string2 = "     New World is Great     ";
$string3 = "hello World";

echo "$string<br>";

//Length of string
echo "Length of string is ".strlen($string);
echo "<br>";

//First Position of substring
echo "First Position of Substring World is ".strpos($string, "World");
echo "<br>";

//Last Position of substring
echo "Last Position of Substring World is ".strrpos($string, "World");
echo "<br>";

// Count of Words in String
echo "Count of Words in String is ".str_word_count($string);
echo "<br>";

// String Reverse
echo "Reverse string is :- ". strrev($string);
echo "<br>";

//Replace the World in string
echo "The replaced word string is : ". str_replace("New", "Awesome", $string);
echo "<br>";

//Repeat the string
echo "The String repeated is : <br>".str_repeat("$string <br>",3);
echo "<br>";

//trim
echo "<pre>";
echo "This is the Original string :- "."$string2";
echo "<br>";
//Remove the whitespace from right side
echo "Whitespace remove from right side: ";
echo rtrim($string2)."$string";
echo "<br>";
//Remove the whitespace from left side
echo "Whitespace remove from left side: ";
echo ltrim($string2);
echo "<br>";
//Remove the whitespace from both side
echo "Whitespace remove from both side: ";
echo trim($string2);
echo "<br>";
echo "</pre>";

//Return the sub string
echo "This is substring : ".substr($string, 6, 5);
echo "<br>";

echo "Original String - "."$string3<br>";

//Convert the whole string to lower characters
echo "String converted to lower case : ".strtolower($string3);
echo "<br>";

//Convert the whole string to upper case
echo "converted to upper case : ".strtoupper($string3);
echo "<br>";

//convert the first letter of the string to upper case
echo "Converted the first letter of the string to upper case : ".ucfirst($string3);
echo "<br>";

//convert the first letter of the each word to upper case
echo "Converted first letter of each word to upper case : ".ucwords($string3);

?>