<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThePriceFinder - Home</title>

    <!--Bootstrap-->
    <link href="toruskit/dist/css/toruskit.bundle.css" rel="stylesheet">
</head>

<?php
include_once "connect.php";
?>

<body>
    <nav class="navbar navbar-expand-sm mr-auto">
        <div class="container">
            <a class="navbar-brand" href="index.php">ThePriceFinder</a>
            <!--
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
            -->
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="shop-list.php">Your Shopping List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                    <?php if (isset($_SESSION["uid"])) {
                        echo '<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="index.php" role="button" data-bs-toggle="dropdown">'. $_SESSION["uid"] .'</a><ul class="dropdown-menu">
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#mLogout">Logout</a></li></ul></li>';
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" href="auth.php">Log In</a>';
                    } ?>
            </ul>
            <!--</div>-->
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mt-6">This About page is still building on process...</h1>
                <h3>Stay tuned!</h3>
            </div>
        </div>
    </div>

    <footer class="footer fixed-bottom text-center py-4">
        <div class="container"><small>Copyright 2022 &copy; <a href="#"
                    class="text-decoration-none">ThePriceFinder</a></small></div>
    </footer>

    <!-- Logout -->
    <div class="modal" id="mLogout">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body">
            <h5>Are you sure you want to logout?</h5>
        </div>
        <div class="modal-footer">
            <form action="logout.php" method="get">
                <button type="submit" class="btn btn-secondary me-2">Yes</a>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
            </form>
        </div>

        </div>
    </div>
    </div>
    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>