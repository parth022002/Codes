<?php
$newdata = "Hu koi nu manto/manti nathi ane Na karvana Kam Karu chhu";
$file = fopen("demo2.txt","w") or exit("Unable to open file");

fwrite($file, $newdata);

fclose($file);
?>