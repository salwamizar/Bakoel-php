<?php
session_start();
include 'config.php';

if (!isset($_SESSION['ID'])) {
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['ID'];
$metode_pembayaran = $_POST['metode_pembayaran'];

// Ambil data beli dari database untuk pengguna saat ini
$sql_beli = "SELECT * FROM beli WHERE id_user='$id_user'";
$result_beli = $is_connect->query($sql_beli);

if ($result_beli->num_rows > 0) {
    while ($row = $result_beli->fetch_assoc()) {
        $id_produk = $row['id_produk'];
        $jumlah = $row['jumlah_beli'];

        // Masukkan data ke tabel beli
        $sql_insert_beli = "INSERT INTO beli (id_user, id_produk, jumlah_beli) VALUES ('$id_user', '$id_produk', '$jumlah')";
        $is_connect->query($sql_insert_beli);

        // Update stok produk
        $sql_update_stok = "UPDATE produk SET stok = stok - $jumlah WHERE ID = '$id_produk'";
        $is_connect->query($sql_update_stok);
    }

    // Reset keranjang beli
    $sql_reset_beli = "DELETE FROM beli WHERE id_user='$id_user'";
    $is_connect->query($sql_reset_beli);
}

$is_connect->close();

if ($metode_pembayaran == 'cash') {
    echo "<script>alert('Terimakasih sudah membayar!'); window.location.href='belanja.php';</script>";
} else if ($metode_pembayaran == 'gopay') {
    header("Location: https://www.gojek.com/pay");
    exit;
}
?>
