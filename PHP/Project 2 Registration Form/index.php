<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: Signin.php");
}

$insert = false;
$update = false;
$delete = false;

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['srnoDelete'])) {
        $srno = $_POST['srnoDelete'];
        $sql = "DELETE FROM `notes` WHERE `srno` = $srno";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $delete = true;
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } elseif (isset($_POST['srnoEdit'])) {
        // Update the record
        $srno = $_POST['srnoEdit'];
        $title = $_POST['titleEdit'];
        $description = $_POST['descriptionEdit'];

        // Use prepared statements to avoid SQL injection
        $stmt = mysqli_prepare($conn, "UPDATE `notes` SET `title` = ?, `description` = ? WHERE `srno` = ?");
        mysqli_stmt_bind_param($stmt, "ssi", $title, $description, $srno);

        if (mysqli_stmt_execute($stmt)) {
            $update = true;
        } else {
            echo "Error updating record: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        // Insert a new record
        $title = $_POST['title'];
        $description = $_POST['description'];

        // Use prepared statements to avoid SQL injection
        $stmt = mysqli_prepare($conn, "INSERT INTO `notes` (`title`, `description`) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $title, $description);

        if (mysqli_stmt_execute($stmt)) {
            $insert = true;
        } else {
            echo "Error inserting data: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <title>Notes</title>
</head>

<body>

    <?php
    require 'components/_nav.php'
        ?>

    <?php
    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show mt-3' role='alert'>
        <strong>Successfully </strong>Added!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    ?>

    <?php
    if ($update) {
        echo "<div class='alert alert-success alert-dismissible fade show mt-3' role='alert'>
        <strong>Successfully </strong>Updated!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    ?>

    <?php
    if ($delete) {
        echo "<div class='alert alert-danger alert-dismissible fade show mt-3' role='alert'>
        <strong>Successfully </strong>Deleted!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    ?>

    <div class="container my-5">
        <h2>Add Notes</h2>
        <form action="/PHP/Project 2 Registration Form/index.php" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Note Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>

    <div class="container my-5">
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Sr.No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                    <th scope="col">Date & Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = mysqli_connect($servername, $username, $password, $database);
                $sql = "SELECT * FROM `notes`";
                $result = mysqli_query($conn, $sql);
                // Display the rows of the data
                if ($result) {
                    $srno = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $srno = $srno + 1;
                        echo "<tr>
                        <td>" . $srno . "</td>
                        <td>" . $row['title'] . "</td>
                        <td>" . $row['description'] . "</td>
                        <td>
                            <button class='edit btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#editModal' data-id='" . $row['srno'] . "'>Edit</button>
                            <form action='/PHP/Project 2 Registration Form/index.php' method='POST' class='d-inline'>
                                <input type='hidden' name='srnoDelete' value='" . $row['srno'] . "'>
                                <button type='submit' class='delete btn btn-sm btn-danger'>Delete</button>
                            </form>
                        </td>
                        <td>" . $row['date'] . "</td>
                    </tr>";
                    }
                } else {
                    echo "Error fetching data: " . mysqli_error($conn);
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

    <!-- Edit modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/PHP/Project 2 Registration Form/index.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="srnoEdit" id="srnoEdit">
                        <div class="mb-3">
                            <label for="titleEdit" class="form-label">Note Title</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit">
                        </div>
                        <div class="mb-3">
                            <label for="descriptionEdit" class="form-label">Description</label>
                            <textarea class="form-control" id="descriptionEdit" name="descriptionEdit"
                                rows="4"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
                "pagingType": "full_numbers"
            });

            // Edit button click handler
            $(document).on('click', '.edit', function () {
                const srno = $(this).data('id');
                const tr = $(this).closest('tr');
                const title = tr.find('td:eq(1)').text();
                const description = tr.find('td:eq(2)').text();

                $('#srnoEdit').val(srno);
                $('#titleEdit').val(title);
                $('#descriptionEdit').val(description);
            });

            // Delete button click handler (confirm deletion)
            $(document).on('click', '.delete', function () {
                return confirm("Are you sure you want to delete this note?");
            });

            // Flash message auto-dismiss
            setTimeout(function () {
                $('.alert').fadeOut('slow');
            }, 5000);
        });
    </script>
</body>

</html>