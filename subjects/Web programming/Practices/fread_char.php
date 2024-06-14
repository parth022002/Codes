<body>
<?php
$file = fopen("demo.txt","r") or exit("Unable to open file");
while(!feof($file))
{
	echo fgetc($file)."<br/>";
}
fclose($file);
?>
</body>