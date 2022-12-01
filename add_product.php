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

$id = isset($_POST["id"]) ? $_POST["id"]: '';
$name = isset($_POST["name"]) ? $_POST["name"]: '';
$price = isset($_POST["price"]) ? $_POST["price"]: '';
$is_available = isset($_POST["is_available"]) ? $_POST["is_available"]: '';

if (isset($_POST["name"])) {
    $sql = "INSERT INTO products (id, name, price, is_available) VALUES ('". $id ."', '". $name ."', " . $price . ", '". $is_available ."')";
    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "0";
    }

}
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
                    <?php if (isset($_SESSION["uid"])) {
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

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-3">
                <div class="btn-group-vertical w-100">
                    <a href="dashboard.php" class="btn btn-outline-primary">Dashboard</a>
                    <a href="products.php" class="btn btn-outline-primary active">Products</a>
                    <a href="accounts.php" class="btn btn-outline-primary">Accounts</a>
                </div>
            </div>
            <div class="col-lg-9">
                <h1>Add Products</h1>
                <div class="alert alert-success alert-dismissible d-none">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Success!</strong> Product added to the database!
                </div>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Error!</strong> There's a problem adding to the database! Please check your network!
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label for="prod_id" class="form_label mt-2">Product ID / Barcode: </label>
                    <input type="text" class="form-control" placeholder="Product ID / Barcode" id="prod_id" name="id">
                    <label for="prod_name" class="form_label mt-2">Product Name: </label>
                    <input type="text" class="form-control" placeholder="Product Name" id="prod_name" name="name">
                    <label for="prod_price" class="form_label mt-2">Product Price: </label>
                    <input type="number" class="form-control" placeholder="Price" id="prod_price" name="price">
                    <label for="is_available" class="form_label mt-2">Availability: </label>
                    <select class="form-select" name="is_available" id="is_available">
                        <option value="1">Available</option>
                        <option value="0">Sold Out</option>
                    </select>
                    <button class="btn btn-primary mt-3 w-100" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer text-center py-4">
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

    <?php
    
    ?>
</body>

</html>