<?php
session_start();
include 'components/_dbconnect.php';
$email = $_SESSION['email'];
$sql = "DELETE FROM users WHERE email = '$email'";
if (mysqli_query($conn, $sql)) {
    session_unset();
    session_destroy();
    header("location: Signin.php");
    exit;
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
