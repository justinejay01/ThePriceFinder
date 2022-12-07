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
$a = "0";
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
                <h1>Products</h1>
                <a href="add_product.php" class="btn btn-primary">Add Product</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="d-none">ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Availability</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sql = "SELECT id, name, price, is_available FROM products ORDER BY name ASC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {?>
                                <tr>
                                    <td class="prod_id d-none"><?php echo $row["id"] ?></td>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td>&#8369;<?php echo $row["price"]; ?></td>
                                    <td><?php $a = $row["is_available"];
                                    if ($a == "1") {
                                        echo "<span class='badge bg-success ms-auto p-2'>Available</span>";
                                    } else {
                                        echo "<span class='badge bg-danger ms-auto p-2'>Sold Out</span>";
                                    } ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <form action="update_product.php" method="post">
                                                <input type="hidden" name="p" value="<?php echo $row["id"] ?>"></input>
                                                <button class="btn btn-sm btn-outline-primary">Update</a>
                                            </form>
                                            <form action="delete_product.php" method="post">
                                                <input type="hidden" name="p" value="<?php echo $row["id"] ?>"></input>
                                                <input type="hidden" name="n" value="<?php echo $row["name"] ?>"></input>
                                                <button class="btn btn-sm btn-outline-danger">Delete</a>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            echo "<p>Not available</p>";
                        } ?>
                    </tbody>
                </table>
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
                    <h6>Are you sure you want to logout?</h6>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
    <!--<script>
        $(".update_btn").click(function() {
            var $r = $(this).closest("tr");
            var $t = $r.find(".prod_id").text();

            alert($t);
        })
    </script>-->
</body>

</html>