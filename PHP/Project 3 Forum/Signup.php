<?php
$showAlert = false;
$showError = false;
$existError = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include 'components/_dbconnect.php';

    // Sanitize user inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $countryCode = mysqli_real_escape_string($conn, $_POST['countryCode']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    // Check if user already exists
    $existSql = "SELECT * FROM `users` WHERE name = '$name' AND email = '$email' AND user_id = '$user_id'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);

    if ($numExistRows > 0) {
        $existError = true;
    } else {
        if ($password == $confirmPassword) {
            // Hash the password
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // Prepare SQL statement with placeholders
            $sql = "INSERT INTO `users` (`name`, `email`, `phone`, `countrycode`, `password`, `Date`, `user_id`) VALUES (?, ?, ?, ?, ?, current_timestamp(), ?)";
            $stmt = mysqli_prepare($conn, $sql);

            // Bind parameters to prepared statement
            mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $phone, $countryCode, $hash, $user_id);

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                $showAlert = true;

                // Start session and set session variables
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['name'] = $name;
                $_SESSION['phone'] = $phone;

                // Redirect to home page after successful signup
                header("Location: index.php");
                exit();
            } else {
                $showError = true;
            }
        } else {
            $showError = true;
        }
    }

    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- logo -->
    <link rel="icon" href="/PHP/Project 3 Forum/images/icons.png" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            color: #198754;
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #198754;
            border-color: #198754;
            padding: 10px 20px;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #147D4E;
            border-color: #147D4E;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #198754;
            font-weight: bold;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Adjust select width */
        .select2-container--default .select2-selection--single {
            width: 90% !important;
        }
    </style>

    <title>Signup</title>
</head>

<body>
    <?php
    if ($showAlert) {
        echo "<div class='alert alert-success alert-dismissible fade show mt-3' role='alert' id='success-alert'>
        <strong>Account </strong>Created Successfully!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        // Add JavaScript for redirection after 2 seconds
        echo "<script>
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 1000);
        </script>";
    }
    ?>

    <?php
    if ($showError) {
        echo "<div class='alert alert-danger alert-dismissible fade show mt-3' role='alert'>
        <strong>Password </strong>didn't match or there was an issue with signup.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    ?>

    <?php
    if ($existError) {
        echo "<div class='alert alert-danger alert-dismissible fade show mt-3' role='alert'>
        <strong> Error! </strong>User Already Exists..
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Signup</h1>
                        <form action="/PHP/Project 3 Forum/Signup.php" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Username</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="user_id" class="form-label">User ID</label>
                                <input type="text" class="form-control" id="user_id" name="user_id" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <select class="form-select" id="countryCode" name="countryCode"
                                            aria-label="Country Code" required>
                                            <?php require 'components/_code.php'; ?>
                                        </select>
                                    </div>
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                        placeholder="Enter your phone number" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary d-block mx-auto">Signup</button>
                        </form>
                        <div class="login-link">
                            <p>Already have an account? <a href="signin.php">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Bootstrap JS bundle (required for Bootstrap components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initialize Select2 plugin
            $('#countryCode').select2({
                placeholder: "Select Country Code",
                allowClear: true // Option to clear selection
            });
        });
    </script>
</body>

</html>