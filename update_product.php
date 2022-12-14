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

if(isset($_POST["update_prod"])) {
    $id = isset($_POST["id"]) ? $_POST["id"]: '';
    $name = isset($_POST["name"]) ? $_POST["name"]: '';
    $price = isset($_POST["price"]) ? $_POST["price"]: '';
    $is_available = isset($_POST["is_available"]) ? $_POST["is_available"]: '';

    $filename = $_FILES["prod_img"]["name"];
    $tempname = $_FILES["prod_img"]["tmp_name"];  
    $folder = "static/img/".$filename; 

    if (isset($_POST["name"])) {
        $sql = "UPDATE products SET name = '". $name ."', price = " . $price . ", is_available = '". $is_available ."', img = '" . $folder . "' WHERE id = '" . $id . "'";
        if ($conn->query($sql) === TRUE) {
            move_uploaded_file($tempname, $folder);
            header("Location: products.php");
        } else {
            echo "<script>alert('There's a problem updating to the database! Please check your network!')</script>";
        }
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
                    <?php if (isset($_SESSION["uid"]) ) {
                        echo '<a class="nav-link" href="dashboard.php">Dashboard</a>';
                    } ?>
                </li>
                <!--<li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>-->
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
                <h1>Update Product</h1>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                    <?php 
                    $p = isset($_POST["p"]) ? $_POST["p"]: '';

                    $sql = "SELECT id, name, price, is_available, img FROM products WHERE id = '" . $p . "'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {?>
                    <label for="prod_id" class="form_label mt-2">Product ID / Barcode: </label>
                    <input type="text" class="form-control" placeholder="Product ID / Barcode" id="prod_id" name="id" value="<?php echo $row["id"] ?>" readonly>
                    <label for="prod_name" class="form_label mt-2">Product Name: </label>
                    <input type="text" class="form-control" placeholder="Product Name" id="prod_name" name="name" value="<?php echo $row["name"] ?>" required>
                    <label for="prod_price" class="form_label mt-2">Product Price: </label>
                    <input type="number" class="form-control" placeholder="Price" id="prod_price" name="price" value="<?php echo $row["price"] ?>" required>
                    <label for="is_available" class="form_label mt-2">Availability: </label>
                    <?php $a = $row["is_available"]; ?>
                    <select class="form-select" name="is_available" id="is_available">
                        <option value="1" <?php if ($a == "1") { echo "selected"; } ?>>Available</option>
                        <option value="0" <?php if ($a == "0") { echo "selected"; } ?>>Sold Out</option>
                    </select>
                    <label for="prod_img" class="form_label mt-2">Image: </label>
                    <input type="file" name="prod_img" id="prod_img" class="form-control">
                    <?php }
                    }
                    ?>
                    <button class="btn btn-primary mt-3 w-100" type="submit" name="update_prod">Update</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer text-center py-4">
        <div class="container"><small>Copyright 2022 &copy; <a href="index.php"
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