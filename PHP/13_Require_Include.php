<?php
//include '_dbconnect.php';
require '_dbconnect.php';

//Fetch the data from database
$sql = "SELECT * FROM `contactus`";
$result = mysqli_query($conn, $sql);
// find the number of rows in database
$num = mysqli_num_rows($result);
echo "Number of rows in database are : " . $num . "<br>";
//Display the rows of the data
if ($num > 0) {
    echo "This the data from database<br>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Sr No.: " . $row['srno'] . "<br>" . "Name: " . $row['name'] . "<br>" . " Email: " . $row['email'] . "<br>" . " Description: " . $row['concern'] . "<br>" . "Date: " . $row['Date'] . "<br>";
    }
} else {
    echo "Error fetching data: " . mysqli_error($conn);
}
?>