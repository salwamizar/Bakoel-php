<?php
session_start();
include 'config.php';

if (!isset($_SESSION['ID'])) {
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['ID'];
$metode_pembayaran = $_POST['metode_pembayaran'];
$waktu_beli = date("Y-m-d H:i:s");

// Ambil data beli dari database untuk pengguna saat ini
$sql_beli = "SELECT beli.*, produk.harga_produk FROM beli JOIN produk ON beli.id_produk = produk.ID WHERE beli.id_user='$id_user'";
$result_beli = $is_connect->query($sql_beli);

if ($result_beli->num_rows > 0) {
    // Memproses setiap produk dalam keranjang beli
    while ($row = $result_beli->fetch_assoc()) {
        $id_produk = $row['id_produk'];
        $jumlah = $row['jumlah_beli'];
        $catatan = $row['catatan'];
        $harga_produk = $row['harga_produk'];
        $total_harga = $harga_produk * $jumlah;

        // Masukkan data ke tabel pesanan
        $sql_insert_pesanan = "INSERT INTO beli (id_user, id_produk, jumlah_beli, metode_pembayaran, total_harga, waktu_beli, catatan) 
                               VALUES ('$id_user', '$id_produk', '$jumlah', '$metode_pembayaran', '$total_harga', '$waktu_beli', '$catatan')";
        if (!$is_connect->query($sql_insert_pesanan)) {
            echo "Error: " . $sql_insert_pesanan . "<br>" . $is_connect->error;
        }

        // Update stok produk
        $sql_update_stok = "UPDATE produk SET stok = stok - $jumlah WHERE ID = '$id_produk'";
        if (!$is_connect->query($sql_update_stok)) {
            echo "Error: " . $sql_update_stok . "<br>" . $is_connect->error;
        }
    }

    // Reset keranjang beli
    $sql_reset_beli = "DELETE FROM beli WHERE id_user='$id_user'";
    if (!$is_connect->query($sql_reset_beli)) {
        echo "Error: " . $sql_reset_beli . "<br>" . $is_connect->error;
    }
}

$is_connect->close();

// Redirect ke halaman yang sesuai berdasarkan metode pembayaran
if ($metode_pembayaran == 'cash') {
    echo "<script>alert('Terimakasih sudah membayar!'); window.location.href='belanja.php';</script>";
} else if ($metode_pembayaran == 'gopay') {
    header("Location: https://www.gojek.com/pay");
    exit;
}
?>
