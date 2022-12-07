<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThePriceFinder - Accounts</title>

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
                <h1>Accounts</h1>
                <a href="add_account.php" class="btn btn-primary">Add Account</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="d-none">ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $sql = "SELECT uid, username FROM accounts ORDER BY uid ASC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {?>
                                <tr>
                                    <td class="d-none" id="<?php echo $row["uid"] ?>"><?php echo $row["uid"] ?></td>
                                    <td><?php echo $row["username"]; ?></td>
                                    <td>
                                    <form action="reset_account.php" method="post">
                                        <input type="hidden" name="p" value="<?php echo $row["uid"] ?>"></input>
                                        <input type="hidden" name="n" value="<?php echo $row["username"] ?>"></input>
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Reset</button>
                                    </form>
                                    </td>
                                    <td>
                                    <form action="delete_account.php" method="post">
                                        <input type="hidden" name="p" value="<?php echo $row["uid"] ?>"></input>
                                        <input type="hidden" name="n" value="<?php echo $row["username"] ?>"></input>
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
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
            <h5>Are you sure you want to logout?</h5>
        </div>
        <<div class="modal-footer">
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