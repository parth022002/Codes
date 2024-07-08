<?php
session_start();
include 'components/_dbconnect.php';

?>

<!DOCTYPE html>
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

    <title>Forum</title>
    <style>
        .card {
            max-width: 18rem;
            height: 24rem;
            display: flex;
            flex-direction: column;
        }

        .card-img-top {
            width: 100%;
            height: 12rem;
            object-fit: cover;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-text {
            flex-grow: 1;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .btn {
            align-self: center;
        }

        .btn-round {
            border-radius: 50%;
            width: 70px;
            height: 70px;
            font-size: 2rem;
        }

        .thread-item {
            display: flex;
            align-items: flex-start;
            background-color: #333;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
            position: relative;
        }

        .thread-content {
            flex-grow: 1;
            margin-right: 200px; /* Give some space for the buttons */
        }

    </style>
</head>

<body>
    <?php
    // Include navigation bar
    require 'components/_nav.php';
    ?>
    <!-- Search Results -->

    <div class="container my-3">
        <h1>Search Results For <em>"<?php echo $_GET['search']; ?>"</em></h1>
        <?php
        $query = $_GET["search"];
        $sql = "SELECT * FROM threads WHERE MATCH (thread_title, thread_desc) AGAINST ('$query')";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_id = $row['thread_id'];
            $url = "threadsquestion.php?threadid=" . $thread_id;
            $noResult = false;

            echo '<div class="result">
                <h3><a href="' . $url . '">' . $title . '</a></h3>
                <p>' . $desc . '</p>
            </div>';
        }
        if ($noResult) {
            echo '<div class="thread-item mt-4">
                <div class="thread-content">
                    <h4 class="mt-0"> No Result Found!! </h4>
                    <hr>
                    <p class="mt-0">Suggestions:
                                    <li>Make sure that all words are spelled correctly.</li>
                                    <li>Try different keywords.</li>
                                    <li>Try more general keywords.</li>
                    </p>
                </div>
            </div>';
        }
        ?>
    </div>
    <?php
    // Include footer
    require 'components/_footer.php';
    ?>

    <!-- Bootstrap Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

        
</body>

</html>