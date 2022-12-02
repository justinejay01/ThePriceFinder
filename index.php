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
                    <?php if (isset($_SESSION["uid"]) && $_SESSION["uid"] == "10001") {
                        echo '<a class="nav-link" href="dashboard.php">Dashboard</a>';
                    } else {
                        echo '<a class="nav-link" href="shop-list.php">Your Shopping List</a>';
                    } ?>
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
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
                    <div class="input-group mb-3 mt-3">
                        <input type="search" class="form-control"
                            placeholder="Search product by typing product name or barcode..." id="s" name="s">
                        <button class="btn btn-primary">Go</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
                <?php
                $s = isset($_GET['s']) ? $_GET['s']: '';

                if (strlen($s) == 0) {
                    $sql = "SELECT id, name, price, is_available FROM products";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="card mt-2">
                                    <img src="https://dummyimage.com/220x220/000/fff" class="card-img-top img-responsive" alt="...">
                                    <div class="card-body">
                                        <p class = "card-title align-middle"><?php echo $row["name"]; ?></p>
                                    </div>
                                    <div class="card-footer d-flex">
                                        <h4 class = "card-text">&#8369;<?php echo $row["price"]; ?></h4>
                                        <h6 class="card-text d-none"><?php echo $row["id"]; ?></h6>
                                        <?php
                                        $a = $row["is_available"];
                                        if ($a == "1") {
                                            echo "<span class='badge bg-success ms-auto p-2'>Available</span>";
                                        } else {
                                            echo "<span class='badge bg-danger ms-auto p-2'>Sold Out</span>";
                                        } ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                } else {                    
                    $sql = "INSERT INTO search (name) VALUES ('". $s ."')";
                    if ($conn->query($sql) === FALSE) {
                       echo "";
                    }

                    $sql = "SELECT id, name, price, is_available FROM products WHERE id LIKE '%". $s ."%' or name LIKE '%". $s ."%'";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="card mt-2">
                                    <img src="https://dummyimage.com/220x220/000/fff" class="card-img-top img-responsive" alt="...">
                                    <div class="card-body">
                                        <p class = "card-title align-middle"><?php echo $row["name"]; ?></p>
                                    </div>
                                    <div class="card-footer d-flex">
                                        <h4 class = "card-text">&#8369;<?php echo $row["price"]; ?></h4>
                                        <h6 class="card-text d-none"><?php echo $row["id"]; ?></h6>
                                        <?php
                                        $a = $row["is_available"];
                                        if ($a == "1") {
                                            echo "<span class='badge bg-success ms-auto p-2'>Available</span>";
                                        } else {
                                            echo "<span class='badge bg-danger ms-auto p-2'>Sold Out</span>";
                                        } ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <footer class="footer fixed-bottom text-center py-4">
        <div class="container"><small>Copyright 2022 &copy; <a href="index.php"
                    class="text-decoration-none">ThePriceFinder</a><a href="version.php" class="text-decoration-none"> v1-alpha1</a></small></div>
    </footer>

    <!-- Logout -->
    <div class="modal" id="mLogout">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body">
            <h5>Are you sure you want to logout?</h5>
        </div>
        <div class="modal-footer">
            <a href="logout.php" class="btn btn-secondary">Yes</a>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
        </div>

        </div>
    </div>
    </div>
    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>