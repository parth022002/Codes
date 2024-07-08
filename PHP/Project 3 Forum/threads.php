<?php
session_start();
include 'components/_dbconnect.php';

$id = intval($_GET['catid']);

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $user_id = $_SESSION['user_id'];

    if (isset($_POST['edit']) && $_POST['edit'] == '1') {
        // Edit Question
        $thread_id = intval($_POST['thread_id']);
        $sql = "UPDATE threads SET thread_title='$title', thread_desc='$desc' WHERE thread_id=$thread_id";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['alert'] = 'Successfully Edited Your Question!';
        } else {
            $_SESSION['alert'] = 'Error: ' . mysqli_error($conn);
        }
    } else {
        // Add Question
        $sql = "INSERT INTO threads (thread_title, thread_desc, thread_category_id, thread_user_id) VALUES ('$title', '$desc', $id, $user_id)";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['alert'] = 'Successfully Added Your Question!';
        } else {
            $_SESSION['alert'] = 'Error: ' . mysqli_error($conn);
        }
    }

    // Redirect to avoid form resubmission on page refresh
    header("Location: threads.php?catid=$id");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- logo -->
    <link rel="icon" href="/PHP/Project 3 Forum/images/icons.png" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom CSS for dark theme -->
    <style>
        body {
            background-color: #222;
            color: #fff;
        }

        .bg-light {
            background-color: #333;
            color: #fff;
        }

        .text-muted {
            color: #ccc;
        }

        .welcome-container {
            background-color: #444;
            color: #fff;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .thread-date {
            color: #aaa;
            font-size: 0.9rem;
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

        .thread-buttons {
            position: absolute;
            bottom: 15px;
            right: 15px;
            display: flex;
            gap: 10px;
        }
    </style>

    <title><?php
        $sql = "SELECT category_name FROM categories WHERE category_id = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $catname = $row['category_name'];
        echo htmlspecialchars($catname) . ' Forum';
    ?></title>
</head>

<body>

    <?php
    require 'components/_nav.php';

    $sql = "SELECT category_name, category_description FROM categories WHERE category_id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $catname = $row['category_name'];
    $catdesc = $row['category_description'];
    ?>

    <!-- Add Question Form -->
    <?php
    if (isset($_SESSION['alert'])) {
        echo "<div class='alert alert-success alert-dismissible fade show mt-3' role='alert'>
                <strong>{$_SESSION['alert']}</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        unset($_SESSION['alert']); // Clear the alert message after displaying
    }
    ?>

    <!-- Welcome Container -->
    <div class="container mt-4">
        <div class="welcome-container">
            <h1 class="display-4">Welcome to <?php echo htmlspecialchars($catname) ?> Forum</h1>
            <p class="lead"><?php echo htmlspecialchars($catdesc) ?></p>
            <hr class="my-4">
            <p><b>Rules : </b><br>
                Be respectful to all members.<br>
                Post relevant and appropriate content.<br>
                Protect your and others' privacy.<br>
                Follow all laws and forum guidelines.</p>
            <a class="btn btn-md btn-success btn-lg" href="#" role="button" id="addQuestionButton">Add Question</a>
            <a class="btn btn-md btn-warning btn-lg" href="/PHP/Project 3 Forum/" role="button">Back to Home</a>
        </div>
    </div>

    <div class="container">
        <h1 class="py-2">Browse Questions</h1>
        <?php
        // Pagination logic
        $questionsPerPage = 10;
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($page - 1) * $questionsPerPage;

        // Fetch total number of questions
        $sqlTotalQuestions = "SELECT COUNT(*) as total FROM threads WHERE thread_category_id = $id";
        $resultTotalQuestions = mysqli_query($conn, $sqlTotalQuestions);
        $totalQuestionsRow = mysqli_fetch_assoc($resultTotalQuestions);
        $totalQuestions = $totalQuestionsRow['total'];
        $totalPages = ceil($totalQuestions / $questionsPerPage);

        // Fetch paginated questions
        $sql = "SELECT * FROM threads WHERE thread_category_id = $id LIMIT $questionsPerPage OFFSET $offset";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $thread_id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $date = $row['date'];
            $threaduserid = $row['thread_user_id'];

            $sql2 = "SELECT name FROM users WHERE user_id = $threaduserid";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $threadusername = $row2['name'];

            echo '<div class="thread-item">
                <img src="/PHP/Project 3 Forum/images/user Default.png" width="34px" class="me-3" alt="...">
                <div class="thread-content">
                    <h5 class="mt-0"> <a class="text-light" href="/PHP/Project 3 Forum/threadsquestion.php?threadid=' . $thread_id . '">' . htmlspecialchars($title) . '</a></h5>
                    <p>' . htmlspecialchars(substr($desc, 0, 350)) . '</p>
                    <small class="thread-date">Posted by ' . htmlspecialchars($threadusername) . '</small><br>
                    <small class="thread-date">Posted on ' . date("F j, Y H:i", strtotime($date)) . '</small>
                </div>
                <div class="thread-buttons">
                    <a class="btn btn-md btn-primary" href="#" role="button" onclick="handleMoreClick(' . $thread_id . ')">Detail</a>
                    <a class="btn btn-md btn-warning" href="#" role="button" onclick="handleEditClick(' . $thread_id . ', \'' . addslashes($title) . '\', \'' . addslashes($desc) . '\')">Edit</a>
                </div>
            </div>';
        }
        if ($noResult) {
            echo '<div class="thread-item">
                <div class="thread-content">
                    <h3 class="mt-0"> No Question?? </h3>
                    <hr>
                    <p class="mt-0">Be the First One to Ask Question?</p>
                </div>
                <div class="thread-buttons">
                    <a class="btn btn-md btn-success" href="#" id="addFirstQuestionButton">Add</a>
                </div>
            </div>';
        }
        ?>

        <!-- Pagination Controls -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
                    <a class="page-link" href="?catid=<?php echo $id; ?>&page=<?php echo $page - 1; ?>" tabindex="-1">Previous</a>
                </li>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php if ($page == $i) echo 'active'; ?>">
                        <a class="page-link" href="?catid=<?php echo $id; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?php if ($page >= $totalPages) echo 'disabled'; ?>">
                    <a class="page-link" href="?catid=<?php echo $id; ?>&page=<?php echo $page + 1; ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <?php
    require 'components/_footer.php';
    ?>

    <!-- Add/Edit Question Modal -->
    <div class="modal fade" id="addQuestionModal" tabindex="-1" aria-labelledby="addQuestionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addQuestionModalLabel">Add Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post"
                        id="questionForm">
                        <div class="mb-3">
                            <label for="questionTitle" class="form-label">Question Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="questionDesc" class="form-label">Question Description</label>
                            <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
                        </div>
                        <input type="hidden" name="catid" value="<?php echo $id; ?>">
                        <input type="hidden" name="thread_id" id="thread_id">
                        <input type="hidden" name="edit" id="edit" value="0">
                        <button type="submit" class="btn btn-primary">Save Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper.js -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    

    <script>
        document.getElementById('addQuestionButton').addEventListener('click', function () {
            <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true): ?>
                alert('You need to log in to add a question.');
            <?php else: ?>
                var addQuestionModal = new bootstrap.Modal(document.getElementById('addQuestionModal'));
                document.getElementById('addQuestionModalLabel').innerText = 'Add Question';
                document.getElementById('title').value = '';
                document.getElementById('desc').value = '';
                document.getElementById('edit').value = '0';
                addQuestionModal.show();
            <?php endif; ?>
        });

        document.getElementById('addFirstQuestionButton').addEventListener('click', function () {
            <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true): ?>
                alert('You need to log in to add a question.');
            <?php else: ?>
                var addQuestionModal = new bootstrap.Modal(document.getElementById('addQuestionModal'));
                document.getElementById('addQuestionModalLabel').innerText = 'Add Question';
                document.getElementById('title').value = '';
                document.getElementById('desc').value = '';
                document.getElementById('edit').value = '0';
                addQuestionModal.show();
            <?php endif; ?>
        });

        function handleMoreClick(id) {
            window.location.href = '/PHP/Project 3 Forum/threadsquestion.php?threadid=' + id;
        }

        function handleEditClick(id, title, desc) {
            <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true): ?>
                alert('You need to log in to edit a question.');
            <?php else: ?>
                var addQuestionModal = new bootstrap.Modal(document.getElementById('addQuestionModal'));
                document.getElementById('addQuestionModalLabel').innerText = 'Edit Question';
                document.getElementById('title').value = title;
                document.getElementById('desc').value = desc;
                document.getElementById('thread_id').value = id;
                document.getElementById('edit').value = '1';
                addQuestionModal.show();
            <?php endif; ?>
        }
    </script>
</body>

</html>
