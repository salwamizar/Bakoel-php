<?php
<<<<<<< HEAD
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
=======

$username = "pembayun";
$password = "12345";
$host =  "localhost";

$is_connect = mysqli_connect($host, $username, $password); // mysql -u phpmyadmin -p -h localhost

if($is_connect){
    mysqli_select_db($is_connect, "bakoel_ofc"); // use izin_db di mysql
}else{
    echo "Try Again...";
}
>>>>>>> 78153d60dd4bc7fb0ac2436ef64b61dff71dc9d8
