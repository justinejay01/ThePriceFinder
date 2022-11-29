<?php

require_once "connect.php";
require "password_compat/lib/password.php";

$u = isset($_POST['u']) ? $_POST['u']: '';
$p = isset($_POST['p']) ? $_POST['p']: '';
$p_hash = hash('sha256', $p);
$if_exist = false;

//Check if exists
$sql = "SELECT username FROM accounts WHERE username='". $u ."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $if_exist = true;
}

if ($if_exist == false) {
    $sql = "INSERT INTO accounts (username, password) VALUES ('". $u ."', '". $p_hash ."')";
    if ($conn->query($sql) === TRUE) {
        echo "2";
    } else {
        echo "0";
    }
} else {
    echo "1";
}

$conn->close();
?>