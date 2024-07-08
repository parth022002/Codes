<?php
function totalMarks($marksArr){
    $sum = 0;
    foreach($marksArr as $value){
        $sum += $value;
    }
    return $sum;
}

$parth = [67, 77, 89, 90 ,84];
$sumMarks = totalMarks($parth);
echo "Total marks is $sumMarks";

?>