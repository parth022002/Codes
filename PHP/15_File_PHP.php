<?php
$myfile = fopen("text.txt","r");

echo fgets($myfile);
echo fgetc($myfile);
?>