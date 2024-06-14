<?php

$newdata = "Mane kai avadtu nathi hu class ma dhyan apto nathi";

$file = fopen("demo.txt","a") or exit("Unable to open file");

fwrite($file, $newdata);

fclose($file);
?>