<?php
session_start();
include 'components/_dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryName = $_POST['categoryName'];
    $categoryDescription = $_POST['categoryDescription'];

    // SQL Injection Prevention
    $categoryName = mysqli_real_escape_string($conn, $categoryName);
    $categoryDescription = mysqli_real_escape_string($conn, $categoryDescription);

    // Insert into categories table
    $sql = "INSERT INTO `categories` (`category_name`, `category_description`, `created_by`) VALUES ('$categoryName', '$categoryDescription', '{$_SESSION['user_id']}')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Category added successfully
        header("Location: index.php?category_added=true");
        exit();
    } else {
        // Error adding category
        header("Location: index.php?category_added=false&error=" . mysqli_error($conn));
        exit();
    }
} else {
    // Redirect if accessed directly
    header("Location: index.php");
    exit();
}
?>
