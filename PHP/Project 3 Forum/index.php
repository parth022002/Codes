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

        /* Adjust carousel image size */
        .carousel-item img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <?php
    // Include navigation bar
    require 'components/_nav.php';

    // Your Unsplash Access Key
    $access_key = 'QuMBijgGr9njrVUmpUdxNjWNkEU1ypS-bG7jCPKXYUM';

    // Endpoint to search for photos with the query "programming-language"
    $url = "https://api.unsplash.com/photos/random?query=programming-language&client_id=$access_key&count=3";

    // Use cURL to make the API request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Get the response and decode it from JSON
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);
    ?>

    <!-- Slider -->
    <div id="carouselExampleAutoplaying" class="carousel slide my-3" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            if (!empty($data)) {
                foreach ($data as $index => $result) {
                    $imageUrl = $result['urls']['regular'];
                    $altDescription = $result['alt_description'];
                    ?>
                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <img src="<?php echo $imageUrl; ?>" class="d-block w-100" alt="<?php echo $altDescription; ?>">
                    </div>
                    <?php
                }
            } else {
                echo "No images found.";
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Category Container -->
    <div class="container my-3">
        <h2 class="text-center my-3">Categories</h2>
        <div class="row justify-content-center">
            <!-- Fetch All the categories -->
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['category_id'];
                    $cat = $row['category_name'];
                    $desc = $row['category_description'];

                    // Limit description length
                    $desc = strlen($desc) > 100 ? substr($desc, 0, 100) . "..." : $desc;

                    // Fetch image for each category
                    $category_url = "https://api.unsplash.com/photos/random?query=" . urlencode($cat) . "&client_id=$access_key&count=1";
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $category_url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $category_response = curl_exec($ch);
                    curl_close($ch);
                    $category_data = json_decode($category_response, true);

                    if (!empty($category_data) && isset($category_data[0])) {
                        $category_image = $category_data[0]['urls']['regular'];
                        $category_alt = $category_data[0]['alt_description'];
                        echo '<div class="col-md-4 my-2">
                        <div class="card">
                            <img src="' . $category_image . '" class="card-img-top" alt="' . $category_alt . '">
                            <div class="card-body">
                                <h5 class="card-title"><a href="/PHP/Project 3 Forum/threads.php?catid=' . $id . '">' . $cat . '</a></h5>
                                <p class="card-text">' . $desc . '</p>
                                <a href="/PHP/Project 3 Forum/threads.php?catid=' . $id . '" class="btn btn-primary mt-auto">View Threads</a>
                            </div>
                        </div>
                    </div>';
                    }
                }
            } else {
                echo "Error fetching categories: " . mysqli_error($conn);
            }
            ?>
            <!-- Add New Category Card -->
            <div class="col-md-4 my-2">
                <div class="card">
                <h5 class="card-title text-center mt-2">Add Category</h5>
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <button class="btn btn-success btn-round" data-bs-toggle="modal" data-bs-target="#addCategoryModal">+</button>
                    </div>
                </div>
            </div>
        </div>
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

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/PHP/Project 3 Forum/add_category.php" method="post">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label">Category Description</label>
                            <textarea class="form-control" id="categoryDescription" name="categoryDescription"
                                rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
