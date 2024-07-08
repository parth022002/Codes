<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: Signin.php");
    exit();
}
include 'components/_dbconnect.php';

$thread_id = intval($_GET['threadid']);

// Fetch thread details
$thread_sql = "SELECT * FROM threads WHERE thread_id = ?";
$stmt = $conn->prepare($thread_sql);
$stmt->bind_param("i", $thread_id);
$stmt->execute();
$thread_result = $stmt->get_result();
$thread = $thread_result->fetch_assoc();
$thread_title = $thread['thread_title'];
$stmt->close();

// Fetch category details
$cat_sql = "SELECT * FROM categories WHERE category_id = ?";
$cat_stmt = $conn->prepare($cat_sql);
$cat_stmt->bind_param("i", $thread['thread_category_id']);
$cat_stmt->execute();
$cat_result = $cat_stmt->get_result();
$category = $cat_result->fetch_assoc();
$category_name = htmlspecialchars($category['category_name']); // Ensure category name is properly sanitized
$category_description = $category['category_description'];
$cat_stmt->close();

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $desc = mysqli_real_escape_string($conn, $_POST['desc']);
        $user_id = $_SESSION['user_id'];
        $insert_sql = "INSERT INTO comments (comment_desc, thread_id, user_id) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("sii", $desc, $thread_id, $user_id);
        $insert_stmt->execute();
        $insert_stmt->close();

        $_SESSION['showAlert'] = true;
        header("Location: threadsquestion.php?threadid=$thread_id");
        exit();
    } else {
        header("Location: Signin.php");
        exit();
    }
}

$showAlert = false;
if (isset($_SESSION['showAlert']) && $_SESSION['showAlert']) {
    $showAlert = true;
    unset($_SESSION['showAlert']);
}

// Pagination logic
$commentsPerPage = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $commentsPerPage;

// Fetch total number of comments
$totalCommentsSql = "SELECT COUNT(*) as count FROM comments WHERE thread_id = ?";
$totalStmt = $conn->prepare($totalCommentsSql);
$totalStmt->bind_param("i", $thread_id);
$totalStmt->execute();
$totalResult = $totalStmt->get_result();
$totalComments = $totalResult->fetch_assoc()['count'];
$totalStmt->close();

$totalPages = ceil($totalComments / $commentsPerPage);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- logo -->
    <link rel="icon" href="/PHP/Project 3 Forum/images/icons.png" type="image/png">

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
            margin-right: 100px;
        }

        .thread-buttons {
            position: absolute;
            bottom: 15px;
            right: 15px;
            display: flex;
            gap: 10px;
        }
    </style>
    <title><?php echo htmlspecialchars($thread_title); ?></title>
</head>

<body>
    <?php include 'components/_nav.php'; ?>

    <?php if ($showAlert): ?>
        <div class='alert alert-success alert-dismissible fade show mt-3' role='alert'>
            <strong>Successfully!</strong> Added Comment
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    <?php endif; ?>

    <div class="container mt-4">
        <div class="welcome-container">
            <h1 class="display-4"><?php echo htmlspecialchars($thread['thread_title']); ?></h1>
            <hr class="my-4">
            <p><?php echo htmlspecialchars($thread['thread_desc']); ?></p>
            <p><b><small class="thread-date">Posted by
                        <?php
                        $user_sql = "SELECT name FROM users WHERE user_id = ?";
                        $user_stmt = $conn->prepare($user_sql);
                        $user_stmt->bind_param("i", $thread['thread_user_id']);
                        $user_stmt->execute();
                        $user_result = $user_stmt->get_result();
                        $user = $user_result->fetch_assoc();
                        echo htmlspecialchars($user['name']);
                        $user_stmt->close();
                        ?>
                    </small></b></p>
            <p><small class="thread-date">Posted on
                    <?php echo date("F j, Y H:i", strtotime($thread['date'])); ?></small></p>
            <a class="btn btn-md btn-success mt-2 btn-lg" href="#" role="button" id="addQuestionButton">Share Your
                Answer</a>
            <a class="btn btn-md btn-primary mt-2 btn-lg"
                href="threads.php?catid=<?php echo $category['category_id']; ?>" role="button">Back to Forum</a>
        </div>
    </div>

    <div class="container">
        <h1 class="py-2">Discussion</h1>
        <?php
        // Fetch comments with pagination
        $comment_sql = "SELECT * FROM comments WHERE thread_id = ? LIMIT ?, ?";
        $comment_stmt = $conn->prepare($comment_sql);
        $comment_stmt->bind_param("iii", $thread_id, $offset, $commentsPerPage);
        $comment_stmt->execute();
        $comment_result = $comment_stmt->get_result();
        $noResult = true;
        while ($comment = $comment_result->fetch_assoc()) {
            $noResult = false;
            $comment_user_sql = "SELECT name FROM users WHERE user_id = ?";
            $comment_user_stmt = $conn->prepare($comment_user_sql);
            $comment_user_stmt->bind_param("i", $comment['user_id']);
            $comment_user_stmt->execute();
            $comment_user_result = $comment_user_stmt->get_result();
            $comment_user = $comment_user_result->fetch_assoc();

            echo '<div class="thread-item">
                <img src="/PHP/Project 3 Forum/images/user Default.png" width="34px" class="me-3" alt="...">
                <div class="thread-content">
                    <p class="font-weight-bold my-0">' . htmlspecialchars($comment_user['name']) . '</p>    
                    <p class="font-weight-light">' . htmlspecialchars($comment['comment_desc']) . '</p>
                    <small class="thread-date">Posted on ' . date("F j, Y H:i", strtotime($comment['comment_time'])) . '</small>
                </div>
            </div>';
            $comment_user_stmt->close();
        }
        $comment_stmt->close();

        if ($noResult) {
            echo '<div class="thread-item">
                <div class="thread-content">
                    <h3 class="mt-0"> No Questions?? </h3>
                    <hr>
                    <p class="mt-0">Be the first one to ask a question?</p>
                </div>
                <div class="thread-buttons">
                    <a class="btn btn-md btn-primary" href="#" id="addFirstQuestionButton">Add</a>
                </div>
            </div>';
        }
        ?>

        <!-- Pagination Controls -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php if ($page <= 1)
                    echo 'disabled'; ?>">
                    <a class="page-link" href="?threadid=<?php echo $thread_id; ?>&page=<?php echo $page - 1; ?>"
                        tabindex="-1">Previous</a>
                </li>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php if ($i == $page)
                        echo 'active'; ?>">
                        <a class="page-link"
                            href="?threadid=<?php echo $thread_id; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?php if ($page >= $totalPages)
                    echo 'disabled'; ?>">
                    <a class="page-link"
                        href="?threadid=<?php echo $thread_id; ?>&page=<?php echo $page + 1; ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <?php include 'components/_footer.php'; ?>

    <div class="modal fade" id="addQuestionModal" tabindex="-1" aria-labelledby="addQuestionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addQuestionModalLabel">Add Discussion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
                        <div class="mb-3">
                            <label for="questionDesc" class="form-label">Discussion</label>
                            <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Discussion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
        document.getElementById('addQuestionButton').addEventListener('click', function () {
            <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true): ?>
                alert('You need to log in to add a question.');
            <?php else: ?>
                var addQuestionModal = new bootstrap.Modal(document.getElementById('addQuestionModal'));
                addQuestionModal.show();
            <?php endif; ?>
        });

        document.getElementById('addFirstQuestionButton').addEventListener('click', function () {
            <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true): ?>
                alert('You need to log in to add a question.');
            <?php else: ?>
                var addQuestionModal = new bootstrap.Modal(document.getElementById('addQuestionModal'));
                addQuestionModal.show();
            <?php endif; ?>
        });
    </script>
</body>

</html>