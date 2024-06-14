<?php
$list =  "Ahuja, Parth ";
$file = fopen("test.csv","w");
fputcsv($file,explode(',',$list));
fclose($file); 
?>