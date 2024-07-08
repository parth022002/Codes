<?php
$a = 24;
$b = 4;
$d = 10;
$e = "10";
$c = 8;
$f = 5;
$g = true;
$h = false;
$i = "Hello";
$j = "World";
$n = null;
$o = "PHP";

// Arithmetic Operators
echo "a = $a<br>";
echo "b = $b<br>";
echo "Arithmetic Operators:<br>";
echo "$a + $b = " . ($a + $b) . "<br>"; // Addition
echo "$a - $b = " . ($a - $b) . "<br>"; // Subtraction
echo "$a * $b = " . ($a * $b) . "<br>"; // Multiplication
echo "$a / $b = " . ($a / $b) . "<br>"; // Division
echo "$a % $b = " . ($a % $b) . "<br>"; // Modulus
echo "$a ** $b = " . ($a ** $b) . "<br>"; // Exponentiation
echo "<br>";

// Assignment Operators
echo "a = $a<br>";
echo "b = $b<br>";
echo "c = $c <br>";
echo "Assignment Operators:<br>";
echo "1) c += a : "."<br>"."$c += $a : ".($c += $a)."<br>"."c = $c <br>"; // Addition assignment
echo "2) c -= b : "."<br>"."$c -= $b : ".($c -= $b)."<br>"."c = $c <br>"; // Subtraction assignment
echo "3) c *= a : "."<br>"."$c *= $a : ".($c *= $a)."<br>"."c = $c <br>"; // Multiplication assignment
echo "4) c /= a : "."<br>"."$c /= $a : ".($c /= $a)."<br>"."c = $c <br>"; // Division assignment
echo "5) c %= a : "."<br>"."$c %= $a : ".($c %= $a)."<br>"."c = $c <br>"; // Modulus assignment
echo "<br>";

// Comparison Operators
echo "a = $a<br>";
echo "b = $b<br>";
echo "d = $d<br>";
echo "e = $e<br>";
echo "Comparison Operators:<br>";
echo "1) \$d == \$e : ";
var_dump($d == $e); // Equal
echo "<br>";
echo "2) \$d === \$e : ";
var_dump($d === $e); // Identical
echo "<br>";
echo "3) \$d != \$e : ";
var_dump($d != $e); // Not equal
echo "<br>";
echo "4) \$d <> \$e : ";
var_dump($d !== $e); // Not identical
echo "<br>";
echo "5) \$d > \$b : ";
var_dump($d > $b); // Greater than
echo "<br>";
echo "6) \$d < \$a : ";
var_dump($d < $a); // Less than
echo "<br>";
echo "7) \$d >= \$e : ";
var_dump($d >= $e); // Greater than or equal to
echo "<br>";
echo "8) \$d <= \$e : ";
var_dump($d <= $e); // Less than or equal to
echo "<br>";
echo "<br>";

// Increment/Decrement Operators
echo "f = $f<br>";
echo "Increment/Decrement Operators:<br>";
echo "1) ++\$f: " . ++$f . "<br>"; // Pre-increment
echo "2) \$f++: " . $f++ . "<br>"; // Post-increment
echo "\$f after post-increment: $f.<br>";
echo "3) --\$f: " . --$f . "<br>"; // Pre-decrement
echo "\$f--: " . $f-- . "<br>"; // Post-decrement
echo "\$f after post-decrement: $f<br>";
echo "<br>";

// Logical Operators
echo "g = $g<br>";
echo "h = 0<br>";
echo "Logical Operators:<br>";
echo "1) \$g && \$h: ";
var_dump($g && $h); // And
echo "<br>";
echo "2) \$g || \$h: ";
var_dump($g || $h); // Or
echo "<br>";
echo "3) !\$h: ";
var_dump(!$h); // Not
echo "<br>";
echo "4) \$g and \$h: ";
var_dump($g and $h); // And (lower precedence)
echo "<br>";
echo "5) \$g or \$h: ";
var_dump($g or $h); // Or (lower precedence)
echo "<br>";
echo "6) \$g xor \$h: ";
var_dump($g xor $h); // Xor
echo "<br>";
echo "<br>";

// String Operators
echo "i = $i<br>";
echo "j = $j<br>";
echo "String Operators:<br>";
echo "\$i . \$j : " . ($i . " " . $j) . "<br>"; // Concatenation
$i .= " PHP";
echo "\$i .= ' PHP' : $i<br>"; // Concatenation assignment
echo "<br>";

// Array Operators
$k = array("a" => "red", "b" => "green");
$l = array("c" => "blue", "d" => "yellow");
echo "k = ";
print_r($k);
echo "<br>";
echo "l = " ;
print_r($l);
echo "<br>";


echo "\nArray Operators:<br>";
echo "\$k + \$l : ";
print_r($k + $l); // Union
echo "<br>";
echo "\$k == \$l : ";
var_dump($k == $l); // Equality
echo "<br>";
echo "\$k === \$l : ";
var_dump($k === $l); // Identity
echo "<br>";
echo "\$k != \$l : ";
var_dump($k != $l); // Inequality
echo "<br>";
echo "\$k <> \$l : ";
var_dump($k <> $l); // Inequality
echo "<br>";
echo "\$k !== \$l : ";
var_dump($k !== $l); // Non-identity
echo "<br>";
echo "<br>";

// Null Coalescing Operator
echo "n = null<br>";
echo "o = $o<br>";
echo "Null Coalescing Operator:<br>";
echo "\$n ?? 'default': " . ($n ?? 'default') . "<br>";// Null coalescing
echo "\$o ?? 'default': " . ($o ?? 'default') . "<br"; 
echo "<br>";

?>
