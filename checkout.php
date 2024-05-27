<?php
session_start();
include 'config.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['ID'])) {
    // Jika belum, redirect ke halaman login.php
    header("Location: login.php");
    exit;
}

// Ambil data beli dari database untuk pengguna saat ini
$sql_beli = "SELECT beli.*, produk.nama_produk, produk.harga_produk, produk.stok, produk.gambar 
                FROM beli 
                JOIN produk ON beli.id_produk = produk.ID
                WHERE beli.id_user='{$_SESSION['ID']}'";
$result_beli = $is_connect->query($sql_beli);

$is_connect->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakoel : Checkout</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./checkout.css">
</head>
<body>
    <div class="container">
        <div id="navbar">
            <img src="./img/logo.jpg" class="logo">
            <nav>
                <ul id="menuList">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="belanja.php">Belanja</a></li>
                    <li><a href="pesanan.php">Riwayat</a></li>
                    <li><a href="profile.php">Profile</a></li>
                </ul>
            </nav>
            <a href="./detail.html" class="icon-link">
                <i class='bx bx-cart-alt'></i>
            </a>
            <img src="./img/menu.png" class="menu-icon" onclick="togglemenu()">
        </div>
        
        <div id="form">
            <div class="form-box">
                <div class="form-content">
                <form id="payment-form" method="POST" action="proses_bayar.php">
                    <h1 class="judul">Bayar Pesanan</h1>
                    <p>Cek lagi pesananmu dan pastikan pesananmu sudah sesuai</p>
                    <div class="table-content">
                        <table>
                            <tr>
                                <th> </th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th> </th>
                            </tr>
                            <?php
                            $total_harga = 0;
                            $notes = array(); // Array untuk menyimpan catatan
                            if ($result_beli->num_rows > 0) {
                                while ($row = $result_beli->fetch_assoc()) {
                                    $total_harga += $row['harga_produk'] * $row['jumlah_beli'];
                                    $notes[] = $row['catatan']; // Menyimpan catatan ke dalam array
                                    echo "<tr>
                                            <td><img src='./img/{$row['gambar']}' alt=''></td>
                                            <td class='nama'>{$row['nama_produk']}</td>
                                            <td>{$row['jumlah_beli']}</td>
                                            <td>{$row['harga_produk']}</td>
                                            <td>
                                                <input type='hidden' name='id_produk[]' value='{$row['id_produk']}'>
                                                <input type='hidden' name='jumlah[]' value='{$row['jumlah_beli']}'>
                                                <input type='hidden' name='catatan[]' value='{$row['catatan']}'>
                                            </td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>Tidak ada produk dalam keranjang</td></tr>";
                            }
                            ?>
                            <tr>
                                <td>Total</td>
                                <td class="nama"></td>
                                <td></td>
                                <td><?php echo $total_harga; ?></td>
                            </tr>
                        </table>
                        <div class="note-content">
                            <div class="note">
                                <ul>
                                    <?php
                                    // Menampilkan setiap catatan dalam elemen <li>
                                    foreach ($notes as $note) {
                                        if (!empty($note)) {
                                            echo "<li>{$note}</li>";
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="metode-bayar">
                        <h4>Metode pembayaran</h4>
                        <div class="bayar-content">
                            <label for="cash">
                                <input type="radio" id="cash" name="metode_pembayaran" value="cash" required>
                                Cash
                            </label>
                            <label for="cashless">
                                <input type="radio" id="cashless" name="metode_pembayaran" value="gopay" required>
                                Gopay/cashless
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn-byr">Bayar</button>
                </form>
                </div>
            </div>
        </div>

        <div id="footer">
            <p class="copyright">&copy; 2024 Bakoel. Hak Cipta Dilindungi Undang-Undang.</p>
        </div>
    </div>

    <script>
        var menuList = document.getElementById("menuList");

        menuList.style.maxHeight = "0px";

        function togglemenu(){
            if(menuList.style.maxHeight == "0px") {
                menuList.style.maxHeight = "130px";
            } else {
                menuList.style.maxHeight = "0px";
            }
        }
    </script>
</body>
</html>
