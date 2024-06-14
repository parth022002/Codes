<?php
$newData = "This is test...";
date_default_timezone_set('Asia/Calcutta');
$date = date('Y-m-d-H-i-s');
$file = fopen($date.".txt","w");
fwrite($file,$newData);
fclose($file);
?>