<?php
//This file contains Data types and variables details

//String 
$string = "String";
echo "$string <br>";

//Integer
$integer = 24;
echo "$integer <br>";

//float
$float = 24.5;
echo "$float <br>";

//Boolean
$boolean = true;
echo "$boolean <br>";

//Array
$array = array("String", 24, 24.5, true);
echo "$array[2] <br>";

//Object
class Car{
    public $name;

    public function __construct($name){
        $this ->name = $name;
    }
}

$car = new Car("BMW <br>");
echo "$car->name";


//NULL
$nullVar = NULL;
echo "$nullVar<br>";

//Resource
$file = fopen("text.txt", "r");

if ($file) {
    // $file is a resource of type (stream)
    echo "File opened successfully.<br>";
    // Perform file operations, e.g., reading the file
    while (($line = fgets($file)) !== false) {
        echo "$line <br>";
    }
    // Always close the resource when done
    fclose($file);
    echo "File Closed. <br>";
} else {
    echo "Failed to open file.\n";
}

//Local 
function myFunction() {
$localVar = "Local Variable<br>";
echo "$localVar";
}
myFunction();

//global
$globalVar = "Global Variable<br>";
function myFunction2() {
    global $globalVar;  
    echo "$globalVar";
}
myFunction2();

//static variable
function myFunction3() {
    static $count = 10;
    $count++;
    echo $count . " ";
}
echo"below are the 6 output of the static variable type <br> ";
myFunction3(); // Outputs: 1
myFunction3(); // Outputs: 2
myFunction3(); // Outputs: 3
myFunction3(); // Outputs: 4
myFunction3(); // Outputs: 5
myFunction3(); // Outputs: 6

?>
