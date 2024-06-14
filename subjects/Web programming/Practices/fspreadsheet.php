<?php
$file = fopen("test.csv","r");
print_r(fgetcsv($file));
fclose($file);
?>