<?php
include 'config.php';

session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['ID'])) {
    // Jika belum, redirect ke halaman login.php
    header("Location: login.php");
    exit;
}

// Ambil data pengguna dari database
$id_user = $_SESSION['ID'];
$sql_user = "SELECT * FROM user WHERE ID='$id_user'";
$sql_toko = "SELECT * FROM toko WHERE ID='$id_user'";
$result_user = $is_connect->query($sql_user);
$result_toko = $is_connect->query($sql_toko);

if ($result_user->num_rows > 0) {
    $user = $result_user->fetch_assoc();
    $toko = $result_toko->fetch_assoc();
} else {
    echo "Data pengguna tidak ditemukan!";
    exit;
}

$is_connect->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakoel | Profile</title>
    <link rel="stylesheet" href="./profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <div id="navbar">
        <img src="./img/logo.jpg" class="logo">
        <nav>
            <ul id="menuList">
                <li><a href="home.php">Home</a></li>
                <li><a href="belanja.php">Belanja</a></li>
                <li><a href="pesanan.php">Riwayat</a></li>
                <li><a href="">Profile</a></li>
            </ul>
        </nav>
        <a href="./detail.html" class="icon-link">
            <i class='bx bx-cart-alt'></i>
        </a>
        <img src="./img/menu.png" class="menu-icon" onclick="togglemenu()">
    </div>
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            Pengaturan Akun
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Ganti password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Toko</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Kontak</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="./img/user (3).png" alt class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn-outline">
                                        Upload foto baru
                                        <input type="file" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control mb-1" value="<?php echo $user['username']; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" class="form-control mb-1" value="<?php echo $user['email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Mulai Jual</label>
                                    <button type="button" class="btn-jual"><a href="">Ajukan</a></button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Password saat ini</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Password baru</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Ulangi password baru</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Nama Toko</label>
                                    <input type="text" class="form-control" value="<?php echo $toko['nama_toko']; ?>">
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Kontak</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" value="<?php echo $toko['nomor_telepon']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-social-links">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">WhatsApp</label>
                                    <input type="text" class="form-control" value="<?php echo $toko['nomor_telepon']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-notifications">
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Aplikasi</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Berita dan pengumuman</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Update produk mingguan</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="button" class="btn-simpan">Simpan perubahan</button>&nbsp;
            <button type="button" class="btn btn-default">Batal</button>
        </div>
    </div>

    <div id="footer">
        <p class="copyright">&copy; 2024 Bakoel. Hak Cipta Dilindungi Undang-Undang.</p>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <script>
        var menuList = document.getElementById("menuList");

        menuList.style.maxHeight = "0px";

        function togglemenu() {
            if (menuList.style.maxHeight == "0px") {
                menuList.style.maxHeight = "130px";
            } else {
                menuList.style.maxHeight = "0px";
            }
        }
    </script>
</body>

</html>
