<!-- nav.php -->
<style>
    body {
        background-color: #131313;
        color: #ffffff;
    }

    .navbar {
        background-color: #1b1b1b;
    }

    .navbar .nav-link,
    .navbar .navbar-brand,
    .navbar .navbar-toggler-icon {
        color: #ffffff;
    }

    .navbar .nav-link:hover {
        color: #198754; /* Change color on hover for all nav-links */
    }

    .navbar .nav-link.active {
        color: #198754; /* Active link color */
    }

    .navbar-brand img {
        height: 36px;
    }

    .form-control {
        background-color: #333333;
        border-color: #555555;
        color: #ffffff;
    }

    .btn-outline-success {
        color: #ffffff;
        border-color: #198754;
    }

    .btn-outline-success:hover {
        background-color: #157347; /* Darker shade on hover */
        border-color: #157347; /* Darker shade on hover */
    }

    .btn-outline-danger {
        color: #ffffff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-outline-danger:hover {
        background-color: #c82333; /* Lighter shade on hover */
        border-color: #c82333; /* Lighter shade on hover */
    }

    .table {
        color: #ffffff;
    }

    .table th,
    .table td {
        vertical-align: middle;
    }

    .modal-content {
        background-color: #1b1b1b;
        color: #ffffff;
    }

    .modal-header {
        border-bottom-color: #333333;
    }

    .modal-footer {
        border-top-color: #dc3545;
    }

    .alert {
        background-color: #198754;
        color: #ffffff;
    }

    /* Custom styles for dropdown buttons */
    .dropdown-item.btn {
        display: inline-block;
        width: auto;
        padding: 0.5rem 1rem;
        margin: 0.25rem;
        font-weight: 400;
        color: #ffffff;
        text-align: center;
        background-color: transparent;
        border: 1px solid transparent;
        border-radius: 0.25rem;
        transition: background-color 0.3s ease;
    }

    .dropdown-item.btn:focus, .dropdown-item.btn:hover {
        color: #ffffff;
        text-decoration: none;
    }

    .dropdown-item.logout-btn {
        background-color: #198754;
        border-color: #198754;
    }

    .dropdown-item.logout-btn:hover {
        background-color: #157347; /* Darker shade on hover */
        border-color: #157347; /* Darker shade on hover */
    }

    .dropdown-item.delete-btn {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .dropdown-item.delete-btn:hover {
        background-color: #c82333; /* Lighter shade on hover */
        border-color: #c82333; /* Lighter shade on hover */
    }

    /* Adjust spacing between dropdown items */
    .dropdown-menu .dropdown-item {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }

    .dropdown-menu .btn-container {
        display: flex;
        justify-content: space-between;
        padding: 0.5rem;
    }
</style>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="/PHP/Project 2 Registration Form/index.php">
                <img src="/PHP/Project 2 Registration Form/images/icon.png" alt="Logo">
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                        href="/PHP/Project 2 Registration Form/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/PHP/Project 2 Registration Form/about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/PHP/Project 2 Registration Form/contact.php">Contact Us</a>
                </li>
            </ul>
        </div>
        <div class="mx-auto">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <div class="d-flex align-items-center">
            <li class="nav-item dropdown list-unstyled">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/PHP/Project 2 Registration Form\images\profile.png" alt="Profile"
                        class="rounded-circle me-2" style="width: 36px; height: 36px;">
                    <?php echo $_SESSION['name']; ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">User Name: <?php echo $_SESSION['name']; ?></a></li>
                    <li><a class="dropdown-item" href="#">Email: <?php echo $_SESSION['email']; ?></a></li>
                    <li><a class="dropdown-item" href="#">Phone: <?php echo $_SESSION['phone']; ?></a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li class="btn-container">
                        <button class="dropdown-item btn logout-btn" onclick="location.href='/PHP/Project 2 Registration Form/Logout.php';">Logout</button>
                        <button class="dropdown-item btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Account</button>
                    </li>
                </ul>
            </li>
        </div>
    </div>
</nav>

<!-- Delete Account Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel" style="color:#dc3545;" >Delete Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>User Name: <?php echo $_SESSION['name']; ?></p>
                <p>Email: <?php echo $_SESSION['email']; ?></p>
                <p>Phone: <?php echo $_SESSION['phone']; ?></p>
                <p class="mt-3">Are you sure you want to delete your account?</p>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" id="deleteCheck">
                    <label class="form-check-label" for="deleteCheck">
                        Yes, I understand that this action is irreversible.
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete Account</button>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript for handling delete account modal
    document.getElementById('confirmDelete').addEventListener('click', function () {
        if (document.getElementById('deleteCheck').checked) {
            // Perform account deletion here (via AJAX or form submission to delete.php)
            window.location.href = '/PHP/Project 2 Registration Form/delete.php';
        } else {
            alert('Please check the box to confirm account deletion.');
        }
    });
</script>
