<?php
$i = 1;
$j = 6;

echo "i = $i<br>";
//while
echo " While Loop using i as an number <br>";
while ($i <= 5) {
    echo "The number is: $i<br>";
    $i++;
}
echo "<br>";

echo "j = $j<br>";
// do while
echo "Do. While Loop using j as an number <br>";
do {
    echo "The number is: $j<br>";
    $j++;
} while ($j <= 5);

//for
echo "<br> For Loop using k as an number <br>";
for ($k = 5; $k >= 0; $k--) {
    echo "The number is: $k<br>";
}

//foreach
echo "<br> Foreach Loop using a array.<br>";
$colors = array("red", "green", "blue", "yellow", "black","white");
echo "colors = ".print_r($colors)."<br>";
foreach ($colors as $color) {
    echo "The color is: $color<br>";
}

?>