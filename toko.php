<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakoel : Ajukan Toko</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./toko.css">
</head>
<body>
    <div class="container">
        <div id="navbar">
            <img src="./img/logo.jpg" class="logo">
            <nav>
                <ul id="menuList">
                    <li><a href="">Home</a></li>
                    <li><a href="">Belanja</a></li>
                    <li><a href="">Riwayat</a></li>
                    <li><a href="">profil</a></li>
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
                        <h1 class="judul">Ajukan Toko</h1>
                        <p>Masukkan Infomasi yang diperlukan untuk mendaftarkan toko</p>
                        <div class="form-label">
                            <label for="telepon">No Telepon</label>
                                <input type="tel" name="telepon" id="telepon" class="input-box">
                            <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="input-box">
                            <label for="shopname">Nama Toko</label>
                                <input type="text" name="shopname" id="shopname" class="input-box">
                        </div>

                        <input type="submit" value="ajukan">
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

            if(menuList.style.maxHeight == "0px")
                {
                    menuList.style.maxHeight = "130px";
                }
            else
                {
                    menuList.style.maxHeight = "0px";
                }
            
        }
    </script>
    
</body>
</html>