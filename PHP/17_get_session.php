<?php
// Start the session
session_start();

if(isset($_SESSION["username"])){
echo "welcome<br>".$_SESSION["username"] = "Parth Ahuja"."<br>";
echo $_SESSION["email"] = "parth@gmail.com";
}
else{
    echo "Session not set";
}
?>
