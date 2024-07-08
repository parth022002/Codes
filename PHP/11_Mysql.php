<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL Connection </title>
</head>

<body>
    <h4>
        <!-- MySQL database Connection Method 
    1. MySQLi:

    i. Procedural:-->
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "contacts";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            echo "Connected successfully using procedural mysqli";
            echo "<br>";
        }
        /*
            //create database
            $sql = "CREATE DATABASE dbtestphp";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "Database created successfully";
            } else {
                echo "Error creating database: " . mysqli_error($conn);
            }

            //create table
            $sql = "CREATE TABLE `user1` (
            `sno` INT(100) NOT NULL AUTO_INCREMENT ,
            `name` VARCHAR(100) NOT NULL ,
            `email` VARCHAR(100) NOT NULL ,
            PRIMARY KEY (`sno`), UNIQUE (`email`)
            )";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "Table created successfully";
            } else {
                echo "Error creating table: " . mysqli_error($conn);
            }

            //Insert the data in table
            $sql = "INSERT INTO `user1` (`name`, `email`) VALUES ('Parth', 'parthahuja@gmail.com')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "Data inserted successfully";
            } else {
                echo "Error inserting data: " . mysqli_error($conn);
            }
            
            //Fetch the data from database
            $sql = "SELECT * FROM `contactus`";
            $result = mysqli_query($conn, $sql);
            // find the number of rows in database
            $num = mysqli_num_rows($result);
            echo "Number of rows in database are : ".$num."<br>";
            //Display the rows of the data
            if ($num > 0) {
                echo "This the data from database<br>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "Sr No.: " . $row['srno'] ."<br>". "Name: " . $row['name'] ."<br>". " Email: " . $row['email'] . "<br>"." Description: " . $row['concern'] . "<br>"."Date: " . $row['Date'] ."<br>";
                }
            } else {
                echo "Error fetching data: " . mysqli_error($conn);
            }

            //Where Clause to fetch the data
            $sql = "SELECT * FROM `contactus` WHERE email = 'xyz@gmail.com'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            echo "Number of rows fetched from database are : ".$num."<br>";

            if ($num > 0) {
                echo "This the data from database<br>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "Sr No.: " . $row['srno'] ."<br>". "Name: " . $row['name'] ."<br>". " Email: " . $row['email'] . "<br>"." Description: " . $row['concern'] . "<br>"."Date: " . $row['Date'] ."<br>";
                }
            } else {
                echo "Error fetching data: " . mysqli_error($conn);
            }

            // Update Query 
            $sql = "UPDATE `contactus` SET `name` = 'xyz12', `concern` = 'Update' WHERE `contactus`.name = 'parth'";
            $result = mysqli_query($conn, $sql);    
            $aff = mysqli_affected_rows($conn);
            echo "<br> Number of rows affected: " . $aff."<br>";

            if ($result) {
                echo "Data updated successfully";
            } else {
                echo "Error updating data: " . mysqli_error($conn);
            }

        // Delete Query
            $sql = "DELETE FROM `contactus` WHERE `contactus`.name = 'xyz12' LIMIT 3";
            $result = mysqli_query($conn, $sql);
            $aff = mysqli_affected_rows($conn);
            echo "<br> Number of rows affected: " . $aff."<br>";

            if ($result) {
                echo "Data deleted successfully";
            } else {
                echo "Error deleting data: " . mysqli_error($conn);
            }
        */

        // Close connection
        mysqli_close($conn);
        echo "<br>";
        ?>

        <!-- ii. Object-Oriented:-->
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "php";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        echo "Connected successfully using Object oriented mysqli <br>";

        // Close connection
        $conn->close();
        echo "<br>";
        ?>

        <!-- 2. PDO PHP Data Objects: -->
        <?php
        $dsn = 'mysql:host=localhost;dbname=php';
        $username = 'root';
        $password = '';

        try {
            // Create a PDO instance
            $pdo = new PDO($dsn, $username, $password);

            // Set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Connected successfully using PDO (PHP Data Objects)";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        // Close connection
        $pdo = null;
        ?>

    </h4>
</body>

</html>