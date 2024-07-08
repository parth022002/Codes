<?php
// readfile("text.txt");

$filename = "text.txt";

// Example of "r" mode (Read only)
$file = fopen($filename, "r") or die("Unable to open file!");
echo "Content of $filename (Read mode):<br>";
while(!feof($file)) {
    echo fgets($file) . "<br>";
}
fclose($file);
echo "<hr>";

// Example of "r+" mode (Read and Write)
$file = fopen($filename, "r+") or die("Unable to open file!");
echo "Content of $filename before writing (Read/Write mode):<br>";
while(!feof($file)) {
    echo fgets($file) . "<br>";
}
fwrite($file, "<br>Additional content in r+ mode.");
fclose($file);

$file = fopen($filename, "r") or die("Unable to open file!");
echo "Content of $filename after writing in r+ mode:<br>";
while(!feof($file)) {
    echo fgets($file) . "<br>";
}
fclose($file);
echo "<hr>";

// Example of "w" mode (Write only)
$file = fopen($filename, "w") or die("Unable to open file!");
$text = "This is content written in write mode.";
fwrite($file, $text);
fclose($file);

$file = fopen($filename, "r") or die("Unable to open file!");
echo "Content of $filename after writing in write mode:<br>";
while(!feof($file)) {
    echo fgets($file) . "<br>";
}
fclose($file);
echo "<hr>";

// Example of "w+" mode (Read and Write, truncate)
$file = fopen($filename, "w+") or die("Unable to open file!");
$text = "Content written in read/write mode (w+).";
fwrite($file, $text);
fclose($file);

$file = fopen($filename, "r") or die("Unable to open file!");
echo "Content of $filename after writing in read/write mode (w+):<br>";
while(!feof($file)) {
    echo fgets($file) . "<br>";
}
fclose($file);
echo "<hr>";

// Example of "a" mode (Append only)
$file = fopen($filename, "a") or die("Unable to open file!");
$text = "<br>Additional content appended in append mode.";
fwrite($file, $text);
fclose($file);

$file = fopen($filename, "r") or die("Unable to open file!");
echo "Content of $filename after appending in append mode:<br>";
while(!feof($file)) {
    echo fgets($file) . "<br>";
}
fclose($file);
echo "<hr>";

// Example of "a+" mode (Read and Append)
$file = fopen($filename, "a+") or die("Unable to open file!");
$text = "<br>Content appended in read/append mode (a+).";
fwrite($file, $text);
fclose($file);

$file = fopen($filename, "r") or die("Unable to open file!");
echo "Content of $filename after appending in read/append mode (a+):<br>";
while(!feof($file)) {
    echo fgets($file) . "<br>";
}
fclose($file);
echo "<hr>";

// Example of "x" mode (Exclusive creation)
$new_filename = "new_file.txt";
$file = fopen($new_filename, "x") or die("Unable to open file!");
$text = "Content created in exclusive mode (x).";
fwrite($file, $text);
fclose($file);

$new_file = fopen($new_filename, "r") or die("Unable to open file!");
echo "Content of $new_filename (Exclusive creation x mode):<br>";
while(!feof($new_file)) {
    echo fgets($new_file) . "<br>";
}
fclose($new_file);

?>