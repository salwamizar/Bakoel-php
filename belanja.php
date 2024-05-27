<?php
include 'config.php';
<<<<<<< HEAD
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['ID'])) {
=======

session_start();
// Periksa apakah pengguna sudah login
if (!isset($_SESSION['ID'])) {
    // Jika belum, redirect ke halaman login.php
>>>>>>> 78153d60dd4bc7fb0ac2436ef64b61dff71dc9d8
    header("Location: login.php");
    exit;
}

// Menambahkan item ke beli
if (isset($_POST['beli'])) {
    $id_produk = $_POST['ID'];
<<<<<<< HEAD
    $stok = 1;

=======
    $stok = 1; // Sesuaikan jumlah sesuai kebutuhan

    // Memeriksa apakah produk sudah ada di beli
>>>>>>> 78153d60dd4bc7fb0ac2436ef64b61dff71dc9d8
    $sql_check = "SELECT * FROM beli WHERE id_produk='$id_produk' AND id_user='{$_SESSION['ID']}'";
    $result_check = $is_connect->query($sql_check);

    if ($result_check->num_rows > 0) {
<<<<<<< HEAD
        $sql_update = "UPDATE beli SET jumlah_beli = jumlah_beli + $stok WHERE id_produk='$id_produk' AND id_user='{$_SESSION['ID']}'";
        $is_connect->query($sql_update);
    } else {
=======
        // Jika produk sudah ada, update jumlah
        $sql_update = "UPDATE beli SET jumlah_beli = jumlah_beli + $stok WHERE id_produk='$id_produk' AND id_user='{$_SESSION['ID']}'";
        $is_connect->query($sql_update);
    } else {
        // Jika produk belum ada, tambahkan produk ke beli
>>>>>>> 78153d60dd4bc7fb0ac2436ef64b61dff71dc9d8
        $sql_insert = "INSERT INTO beli (id_user, id_produk, jumlah_beli) VALUES ('{$_SESSION['ID']}', '$id_produk', '$stok')";
        $is_connect->query($sql_insert);
    }
}

// Mengambil produk dari database
<<<<<<< HEAD
$search = isset($_POST['search']) ? $_POST['search'] : '';
$search_query = $search ? "WHERE produk.nama_produk LIKE '%$search%'" : '';

$sql_produk = "SELECT produk.*, toko.nama_toko 
               FROM produk 
               JOIN toko ON produk.id_toko = toko.ID
               $search_query";
=======
$sql_produk = "SELECT * FROM produk";
>>>>>>> 78153d60dd4bc7fb0ac2436ef64b61dff71dc9d8
$result_produk = $is_connect->query($sql_produk);

// Mengambil beli untuk pengguna saat ini
$sql_beli = "SELECT beli.*, produk.nama_produk, produk.harga_produk 
             FROM beli 
             JOIN produk ON beli.id_produk = produk.ID
             WHERE beli.id_user='{$_SESSION['ID']}'";
$result_beli = $is_connect->query($sql_beli);

// Menghitung jumlah pembelian untuk pengguna saat ini
$id_user = $_SESSION['ID'];
$sql_jumlah_pembelian = "SELECT COUNT(*) AS total_pembelian FROM beli WHERE id_user='$id_user'";
$result_jumlah_pembelian = $is_connect->query($sql_jumlah_pembelian);
if ($result_jumlah_pembelian) {
    $row_jumlah_pembelian = $result_jumlah_pembelian->fetch_assoc();
<<<<<<< HEAD
    $x = $row_jumlah_pembelian['total_pembelian'] + 1;
} else {
    $x = 1;
}
=======
    $x = $row_jumlah_pembelian['total_pembelian'] + 1; // Nomor pembelian berikutnya
} else {
    $x = 1; // Jika tidak ada pembelian sebelumnya
}

$is_connect->close();
>>>>>>> 78153d60dd4bc7fb0ac2436ef64b61dff71dc9d8
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakoel : Belanja</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="belanja.css">
</head>
<body>
<<<<<<< HEAD
=======
    
>>>>>>> 78153d60dd4bc7fb0ac2436ef64b61dff71dc9d8
    <div class="container">
        <div id="navbar">
            <img src="./img/logo.jpg" class="logo">
            <nav>
                <ul id="menuList">
                    <li><a href="./home.php">Home</a></li>
                    <li><a href="./belanja.php">Belanja</a></li>
                    <li><a href="./pesanan.php">Riwayat</a></li>
                    <li><a href="./profile.php">Profile</a></li>
                </ul>
            </nav>
            <a href="./detail.php" class="icon-link">
                <i class='bx bx-cart-alt'></i>
            </a>
            <img src="./img/menu.png" class="menu-icon" onclick="togglemenu()">
        </div>
<<<<<<< HEAD

        <div id="search-bar">
            <div class="search-container">
                <form method="POST" class="search-form">
                    <input type="text" placeholder="Search.." name="search" class="search-input">
                    <button type="submit"><i class='bx bx-search'></i></button>
=======
        <div id="search-bar">
            <div class="search-container">
                <form action="/action_page.php" class="search-form">
                  <input type="text" placeholder="Search.." name="search" class="search-input">
                  <button type="submit"><i class='bx bx-search'></i></button>
>>>>>>> 78153d60dd4bc7fb0ac2436ef64b61dff71dc9d8
                </form>
            </div>
        </div>

        <div id="user-profile">
            <div class="user-box">
                <div class="user-content">
                    <div class="text-content">
<<<<<<< HEAD
                        <h4><?php echo $_SESSION['username']; ?></h4>
                        <p><?php echo $_SESSION['email']; ?></p>
=======
                    <h4><?php echo $_SESSION['username']; ?></h4>
                    <p><?php echo $_SESSION['email']; ?></p>
>>>>>>> 78153d60dd4bc7fb0ac2436ef64b61dff71dc9d8
                    </div>
                    <div class="user-logo"><img src="./img/user (3).png" class="profile"></div>
                </div>
            </div>
            <div class="btn-logout">
                <button><a href="logout.php">Logout</a></button>
            </div>
        </div>
<<<<<<< HEAD

=======
>>>>>>> 78153d60dd4bc7fb0ac2436ef64b61dff71dc9d8
        <div id="keranjang">
            <div class="table-box">
                <div class="table-title">
                    <h2>Keranjang</h2>
<<<<<<< HEAD
                    <p>pembelian ke-<?php echo $x; ?></p>
=======
                    <p>pembelian ke-<?php echo $x; ?></p> <!-- Nomor pembelian berikutnya --> 
>>>>>>> 78153d60dd4bc7fb0ac2436ef64b61dff71dc9d8
                </div>
                <table>
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                    <?php
<<<<<<< HEAD
                    if ($result_beli->num_rows > 0) {
                        $total = 0;
                        while ($row = $result_beli->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['nama_produk']}</td>
                                    <td>{$row['jumlah_beli']}</td>
                                    <td>{$row['harga_produk']}</td>
                                  </tr>";
                            $total += $row['jumlah_beli'] * $row['harga_produk'];
                        }
                        echo "<tr>
                                <td>Total</td>
                                <td></td>
                                <td>{$total}</td>
                              </tr>";
                    } else {
                        echo "<tr><td colspan='3'>Keranjang kosong</td></tr>";
                    }
                    ?>
=======
                if ($result_beli->num_rows > 0) {
                    $total = 0;
                    while ($row = $result_beli->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['nama_produk']}</td>
                                <td>{$row['jumlah_beli']}</td>
                                <td>{$row['harga_produk']}</td>
                              </tr>";
                        $total += $row['jumlah_beli'] * $row['harga_produk'];
                    }
                    echo "<tr>
                            <td>Total</td>
                            <td></td>
                            <td>{$total}</td>
                          </tr>";
                } else {
                    echo "<tr><td colspan='3'>Keranjang kosong</td></tr>";
                }
                ?>
>>>>>>> 78153d60dd4bc7fb0ac2436ef64b61dff71dc9d8
                </table>
                <form method="post" action="checkout.php">
                    <button type="submit" name="bayar" class="btn-table">Bayar</button>
                </form>
            </div>
        </div>
<<<<<<< HEAD

        <div id="produk">
            <div class="produk-list">
            <?php
=======
        <div id="produk">
            <div class="produk-list">
                <?php
>>>>>>> 78153d60dd4bc7fb0ac2436ef64b61dff71dc9d8
                if ($result_produk->num_rows > 0) {
                    while ($row = $result_produk->fetch_assoc()) {
                        echo "<div class='produk-box'>
                                <div class='produk-img'>
                                    <img src='./img/{$row['gambar']}' alt=''>
                                </div>
                                <div class='produk-content'>
                                    <div class='produk-desc'>
                                        <h4>{$row['nama_produk']}</h4>
                                        <p class='harga'>Rp {$row['harga_produk']}</p>
                                        <p class='stok'>stok : {$row['stok']}</p>
<<<<<<< HEAD
                                        <p class='publisher'>{$row['nama_toko']}</p>
                                        <p class='tanggal'>{$row['waktu_posting']}</p>
                                        <form method='get' action='detail.php'>
                                            <input type='hidden' name='ID' value='{$row['ID']}'>
                                            <button type='submit' class='btn-produk'>Detail</button>
=======
                                        <p class='id_toko'>{$row['id_toko']}</p>
                                        <p class='waktu_posting'>{$row['waktu_posting']}</p>
                                        <form method='get' action='detail.php'>
                                            <input type='hidden' name='ID' value='{$row['ID']}'>
                                            <button type='submit' class='btn'>Detail</button>
>>>>>>> 78153d60dd4bc7fb0ac2436ef64b61dff71dc9d8
                                        </form>
                                    </div>
                                </div>
                            </div>";
                    }
                } else {
<<<<<<< HEAD
                    echo "<p>Tidak ada produk yang ditemukan</p>";
                }
            ?>
            </div>
        </div>
=======
                    echo "<p>Belum ada produk yang ditambahkan</p>";
                }
                ?>
            </div>
        </div>
        <div id="footer">
            <p class="copyright">&copy; 2024 Bakoel. Hak Cipta Dilindungi Undang-Undang.</p>
        </div>
>>>>>>> 78153d60dd4bc7fb0ac2436ef64b61dff71dc9d8
    </div>
</body>
<script>
    var menuList = document.getElementById("menuList");

    menuList.style.maxHeight = "0px";

    function togglemenu() {
        if (menuList.style.maxHeight == "0px") {
            menuList.style.maxHeight = "200px";
        } else {
            menuList.style.maxHeight = "0px";
        }
    }
</script>
</html>
<<<<<<< HEAD

<?php
$is_connect->close();
?>
=======
>>>>>>> 78153d60dd4bc7fb0ac2436ef64b61dff71dc9d8
