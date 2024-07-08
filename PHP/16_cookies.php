<?php
// Set a cookie
$name = "Admin";
$value = "Parth Ahuja";
$expire = time() + 86400 ; // 86400 = 1 day
$path = "/"; // Available in the entire domain

setcookie($name, $value, $expire, $path);

// Confirm the cookie is set
if(isset($_COOKIE[$name])) {
    echo "Cookie named '" . $name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$name];
} else {
    echo "Cookie named '" . $name . "' is not set.";
}
?>
