<?php
session_start();
include 'config.php';

if (!isset($_SESSION['ID'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['tambah_produk'])) {
        $nama_produk = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $foto = $_FILES['foto']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($foto);

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            $sql = "INSERT INTO produk (nama_produk, harga, stok, foto) VALUES ('$nama_produk', '$harga', '$stok', '$foto')";
            if ($is_connect->query($sql) === TRUE) {
                echo "Produk berhasil ditambahkan";
            } else {
                echo "Error: " . $sql . "<br>" . $is_connect->error;
            }
        } else {
            echo "Error uploading file.";
        }
    }

    if (isset($_POST['update_produk'])) {
        $id = $_POST['id'];
        $nama_produk = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $foto = $_FILES['foto']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($foto);

        if ($foto) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $sql = "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', stok='$stok', foto='$foto' WHERE id='$id'";
            } else {
                echo "Error uploading file.";
            }
        } else {
            $sql = "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', stok='$stok' WHERE id='$id'";
        }

        if ($is_connect->query($sql) === TRUE) {
            echo "Produk berhasil diupdate";
        } else {
            echo "Error: " . $sql . "<br>" . $is_connect->error;
        }
    }
}

$sql = "SELECT * FROM produk";
$result = $is_connect->query($sql);
$products = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakoel : Menu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./menu.css">
</head>
<body>
    <div class="container">
        <div id="navbar">
            <img src="./img/logo.jpg" class="logo">
            <nav>
                <ul id="menuList">
                    <li class="nav-li"><a href="./home.php">Home</a></li>
                    <li class="nav-li"><a href="./belanja.php">Belanja</a></li>
                    <li class="nav-li"><a href="./pesanan.php">Riwayat</a></li>
                    <li class="nav-li"><a href="./profile.php">Profile</a></li>
                </ul>
            </nav>
            <a href="./detail.php" class="icon-link">
                <i class='bx bx-cart-alt'></i>
            </a>
            <img src="./img/menu.png" class="menu-icon" onclick="togglemenu()">
        </div>

        <div class="halaman">
            <ul class="accordion">
                <li>
                    <input type="radio" name="accordion" id="first" checked>
                    <label class="label-1" for="first">Tambah Menu</label>
                    <div class="content">
                        <form action="menu.php" method="POST" enctype="multipart/form-data">
                            <label class="label-2" for="nama-produk">Nama Produk</label>
                            <input type="text" id="nama" name="nama_produk" placeholder="Nama Produk.." required>
                          
                            <label for="harga-produk">Harga Produk</label>
                            <input type="text" id="harga" name="harga" placeholder="Harga.." required>
                          
                            <label for="jumlah-produk">Jumlah</label>
                            <input type="text" id="jumlah" name="stok" placeholder="Jumlah.." required>

                            <label for="foto-produk">Upload Foto Produk</label>
                            <input type="file" id="foto" name="foto" required>
                          
                            <input type="submit" name="tambah_produk" value="Tambahkan">
                        </form>
                    </div>
                </li>
                <li>
                    <input type="radio" name="accordion" id="second">
                    <label class="label-1" for="second">List Menu</label>
                    <div class="content">
                        <div class="table-content">
                            <table>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama Produk</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><img src="uploads/<?php echo $product['gambar']; ?>"></td>
                                    <td class="nama"><?php echo $product['nama_produk']; ?></td>
                                    <td><?php echo $product['stok']; ?></td>
                                    <td><?php echo $product['harga_produk']; ?>/pcs</td>
                                    <td>
                                        <button class="myBtn" data-id="<?php echo $product['ID']; ?>" data-nama="<?php echo $product['nama_produk']; ?>" data-harga="<?php echo $product['harga_produk']; ?>" data-stok="<?php echo $product['stok']; ?>" data-foto="<?php echo $product['gambar']; ?>">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <!-- The Modal -->
                        <div id="myModal" class="modal">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <div class="modal-container">
                                    <form action="menu.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-1">
                                                <img id="modal-foto" src="" alt="">
                                            </div>
                                            <div class="col-2">
                                                <h2>Ganti Foto</h2>
                                                <input type="file" id="modal-file" name="foto">
    
                                                <h2>Nama Produk</h2>
                                                <input type="text" id="modal-nama" name="nama_produk" placeholder="Nama Produk">
                                            </div>
                                        </div>
    
                                        <h2 class="h2-ket">Harga Produk</h2>
                                        <input type="text" id="modal-harga" name="harga" placeholder="Harga">

                                        <h2 class="h2-ket">Stok</h2>
                                        <input type="text" id="modal-stok" name="stok" placeholder="Stok">

                                        <input type="hidden" id="modal-id" name="id">
                                        <input type="submit" name="update_produk" value="Simpan">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div id="footer">
            <p class="copyright">&copy; 2024 Bakoel. Hak Cipta Dilindungi Undang-Undang.</p>
        </div>
    </div>

    <script>
        // Toggle menu
        function togglemenu(){
            var menuList = document.getElementById("menuList");
            menuList.style.maxHeight = menuList.style.maxHeight == "0px" ? "130px" : "0px";
        }

        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the buttons that open the modal
        var buttons = document.querySelectorAll(".myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on any button, open the modal
        buttons.forEach(function(btn) {
            btn.onclick = function() {
                var id = btn.getAttribute('data-id');
                var nama = btn.getAttribute('data-nama');
                var harga = btn.getAttribute('data-harga');
                var stok = btn.getAttribute('data-stok');
                var foto = btn.getAttribute('data-foto');

                document.getElementById('modal-id').value = id;
                document.getElementById('modal-nama').value = nama;
                document.getElementById('modal-harga').value = harga;
                document.getElementById('modal-stok').value = stok;
                document.getElementById('modal-foto').src = 'uploads/' + foto;

                modal.style.display = "block";
            };
        });

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        };

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
    </script>
</body>
</html>
