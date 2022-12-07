<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThePriceFinder - Reset Account</title>

    <!--Bootstrap-->
    <link href="toruskit/dist/css/toruskit.bundle.css" rel="stylesheet">
</head>

<?php
include_once "connect.php";

$id = isset($_POST["id"]) ? $_POST["id"]: '';
$p = isset($_POST["p"]) ? $_POST["p"]: '';
$r_p = isset($_POST["r_p"]) ? $_POST["r_p"]: '';

$p_hash = hash("sha256", $p);
$rp_hash = hash("sha256", $r_p);

if (isset($_POST["p"]) && isset($_POST["r_p"])) {
    if($p_hash == $rp_hash) {
        $sql = "UPDATE accounts SET password = '". $p_hash ."' WHERE uid = '" . $id . "'";
        if ($conn->query($sql) === TRUE) {
            header("Location: accounts.php");
        } else {
            echo "<script>alert('There's a problem updating to the database! Please check your network!')</script>";
        }
    } else {
        echo "<script>alert('Password not match!')</script>";
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
                    <?php if (isset($_SESSION["uid"]) && $_SESSION["uid"] == "10001") {
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
                    <a href="products.php" class="btn btn-outline-primary">Products</a>
                    <a href="accounts.php" class="btn btn-outline-primary active">Accounts</a>
                </div>
            </div>
            <div class="col-lg-9">
                <?php 
                    $uid = isset($_POST["p"]) ? $_POST["p"]: '';
                    $n = isset($_POST["n"]) ? $_POST["n"]: '';
                ?>
                <h1>Reset Password <h6>for <?php echo $n; ?></h6></h1>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $uid ?>">
                    <label for="acc_p" class="form_label mt-2">New Password: </label>
                    <input type="password" class="form-control" placeholder="New Password" id="acc_p" name="p">
                    <label for="acc_rp" class="form_label mt-2">Repeat New Password: </label>
                    <input type="password" class="form-control" placeholder="Repeat New Password" id="acc_rp" name="r_p">
                    
                    <button class="btn btn-primary mt-3 w-100" type="submit">Update</button>
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