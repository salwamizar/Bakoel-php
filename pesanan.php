<?php
include 'config.php';
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['ID'])) {
    // Jika belum, alihkan ke halaman login.php
    header("Location: login.php");
    exit();
}

// Query untuk mendapatkan pesanan dari tabel beli
$query = "SELECT beli.*, user.username FROM beli JOIN user ON beli.id_user = user.ID";
$result = mysqli_query($is_connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakoel : Pesanan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./pesanan.css">
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
                    <form action="">
                        <h1 class="judul">Pesanan Baru</h1>
                        <p>Segera terima pesananmu agar pembeli tidak menunggu lama</p>
                        <div class="table-content">
                            <table>
                                <tr>
                                    <th> </th>
                                    <th>Username</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th> </th>
                                </tr>
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>
                                                <td><img src='./img/user (3).png' alt=''></td>
                                                <td class='nama'>{$row['username']}</td>
                                                <td>{$row['jumlah']}</td>
                                                <td>{$row['total_harga']}</td>
                                                <td>
                                                    <button class='myBtn'>
                                                        detail
                                                    </button>
                                                </td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>Tidak ada pesanan.</td></tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </form>
                </div>
            </div>

            <div class="form-box2">
                <div class="form-content">
                    <form action="">
                        <h1 class="judul">Riwayat Pemesanan</h1>
                        <p>Riwayat pesanan yang sudah diselesaikan</p>
                        <div class="table-content">
                            <table>
                                <tr>
                                    <th> </th>
                                    <th>Username</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th> </th>
                                </tr>
                                <!-- Ambil data riwayat pesanan dari database -->
                                <?php
                                $query_riwayat = "SELECT beli.*, user.username FROM beli JOIN user ON beli.id_user = user.ID WHERE beli.status = 'selesai'";
                                $result_riwayat = mysqli_query($is_connect, $query_riwayat);
                                
                                if (mysqli_num_rows($result_riwayat) > 0) {
                                    while ($row_riwayat = mysqli_fetch_assoc($result_riwayat)) {
                                        echo "<tr>
                                                <td><img src='./img/user (3).png' alt=''></td>
                                                <td class='nama'>{$row_riwayat['username']}</td>
                                                <td>{$row_riwayat['jumlah']}</td>
                                                <td>{$row_riwayat['total_harga']}</td>
                                                <td>
                                                    <button class='myBtn2'>
                                                        detail
                                                    </button>
                                                </td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>Tidak ada riwayat pesanan.</td></tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-container">
                <table>
                    <tr>
                        <th> </th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th> </th>
                    </tr>
                    <tr>
                        <td><img src="./img/62e35a47c7535.jpg" alt=""></td>
                        <td class="nama">Risol Mayoooooooooooooooooooooooooooooo</td>
                        <td>2</td>
                        <td>4.000</td>
                    </tr>
                    <tr>
                        <td><img src="./img/bolen.jpg" alt=""></td>
                        <td class="nama">bolen history</td>
                        <td>2</td>
                        <td>6.000</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td class="nama"></td>
                        <td>4</td>
                        <td>10.000</td>
                    </tr>
                </table>
                <div class="note-content">
                    <div class="note">
                        <ul>
                            <li>pilihin yang risolnya gede</li>
                            <li>bolennya yang masih garing yaaaaaa</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="metode-bayar">
                <h4>Metode pembayaran</h4>
                <div class="bayar-content">
                    <li>Gopay/Cashless</li>
                </div>
            </div>
            <p>waktu pemesanan : xxxxxxx</p>

            <button type="submit" class="btn-byr">
                <a href="">Tandai Pesanan Siap</a>
            </button>
        </div>

        <div id="myModal2" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-container">
                <table>
                    <tr>
                        <th> </th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th> </th>
                    </tr>
                    <tr>
                        <td><img src="./img/62e35a47c7535.jpg" alt=""></td>
                        <td class="nama">Risol Mayoooooooooooooooooooooooooooooo</td>
                        <td>2</td>
                        <td>4.000</td>
                    </tr>
                    <tr>
                        <td><img src="./img/bolen.jpg" alt=""></td>
                        <td class="nama">bolen history</td>
                        <td>2</td>
                        <td>6.000</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td class="nama"></td>
                        <td>4</td>
                        <td>10.000</td>
                    </tr>
                </table>
                <div class="note-content">
                    <div class="note">
                        <ul>
                            <li>pilihin yang risolnya gede</li>
                            <li>bolennya yang masih garing yaaaaaa</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="metode-bayar">
                <h4>Metode pembayaran</h4>
                <div class="bayar-content">
                    <li>Gopay/Cashless</li>
                </div>
            </div>
            <p>waktu pemesanan : xxxxxxx</p>
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

        // Modal 1
        var modal1 = document.getElementById("myModal");
        var buttons1 = document.querySelectorAll(".myBtn");
        var close1 = document.querySelectorAll(".close")[0];

        buttons1.forEach(function(btn) {
            btn.onclick = function(event) {
                event.preventDefault(); // Prevent form submission
                modal1.style.display = "block";
            };
        });

        close1.onclick = function() {
            modal1.style.display = "none";
        };

        window.onclick = function(event) {
            if (event.target == modal1) {
                modal1.style.display = "none";
            }
        };

        // Modal 2
        var modal2 = document.getElementById("myModal2");
        var buttons2 = document.querySelectorAll(".myBtn2");
        var close2 = document.querySelectorAll(".close")[1];

        buttons2.forEach(function(btn) {
            btn.onclick = function(event) {
                event.preventDefault(); // Prevent form submission
                modal2.style.display = "block";
            };
        });

        close2.onclick = function() {
            modal2.style.display = "none";
        };

        window.onclick = function(event) {
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
        };
    </script>
</body>
</html>
