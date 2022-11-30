<?php
session_start();
require_once "connect.php";

$u = isset($_POST['u']) ? $_POST['u']: '';
$p = isset($_POST['p']) ? $_POST['p']: '';
$p_hash = hash('sha256', $p);

$sql = "SELECT uid, username, password FROM accounts WHERE username='". $u ."' and password='". $p_hash ."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $_SESSION["uid"] = $row["uid"];
        echo "1";
    }
} else {
    echo "0";
}

$conn->close();
?>