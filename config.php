<?php
$username = "salwa";
$password = "12345";
$host = "localhost";

$is_connect = mysqli_connect($host, $username, $password);

if ($is_connect) {
    mysqli_select_db($is_connect, "bakoel_ofc");
} else {
    echo "Try Again...";
}
?>
