<?php
//pengecekan session apakah ada atau tidak
session_start(); 
if (!isset($_SESSION['ID'])) { // !isset > data tidak ada ; null != data
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakoel : Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="home.css">
</head>
<body>
    
<div class="container">
    <div id="navbar">
        <img src="./img/logo.jpg" class="logo">
        <nav>
            <ul id="menuList">
                <li><a href="">Home</a></li>
                <li><a href="./belanja.php">Belanja</a></li>
                <li><a href="./pesanan.php">Riwayat</a></li>
                <li><a href="./profile.php">Profile</a></li>
            </ul>
        </nav>
        <img src="./img/menu.png" class="menu-icon" onclick="togglemenu()">
    </div>

    <div id="user-account">
        <div class="user-box">
            <div class="user-content">
                <div class="text-content">
                    <h4><?php echo $_SESSION['username']; ?></h4>
                    <p><?php echo $_SESSION['email']; ?></p>
                </div>
                <div class="user-logo"><img src="./img/user (3).png" class="profile"></div>
            </div>
        </div>
        <div class="btn-logout">
            <button><a href="./logout.php">Logout</a></button>
        </div>
        <!--<button><a href="./logout.php">Logout</a></button>-->
    </div>

    <div id="pesanan">
        <div class="pesanan-box">
            <div class="pesanan-content">
                <div class="pesanan-icon">
                    <img src="./img/icons8-bag-64.png" alt="">
                </div>
                <div class="pesanan-text">
                    <h4>Detail Pesanan</h4>
                    <p>belum ada pesanan</p>
                </div>
            </div>
        </div>
    </div>
    
    <div id="tagline">
        <div class="tagline-box">
            <div class="tagline-content">
                <div class="tagline-text">
                    <h1>Selamat datang kembali!</h2>
                    <p>mau ngapain hari ini?</p>
                </div>
                <div class="tagline-img">
                    <img src="./img/3d-business-joyful-man-with-phone-waving-his-hand.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <div id="menu1">
        <div class="menu1-box">
            <div class="menu1-content">
                <a href="./belanja.php" class="link">
                    <i class='bx bx-bowl-hot'></i>
                    <p>Belanja</p>
                </a>
                <a href="./menu.php" class="link">
                    <i class='bx bx-food-menu'></i>
                    <p>Menu</p>
                </a>
                <a href="#link3" class="link">
                    <i class='bx bx-history'></i>
                    <p>History</p>
                </a>
                <a href=".belanja.php" class="link">
                    <i class='bx bx-search'></i>
                    <p>Search</p>
                </a>
                <a href="#link5" class="link">
                    <i class='bx bx-help-circle'></i>
                    <p>Help</p>
                </a>
            </div>
            <div class="menu1-content-desc">
            </div>
        </div>
    </div>
    <div id="menu2"></div>

    <div id="footer">
        <div class="footer-box">
            <div class="help-content">
                <div class="logo-bantuan">
                    <img src="./icons8-help-pulsar-color/icons8-help-96.png" class="help-logo">
                </div>
                <div class="text-bantuan">
                    <h4>Pusat bantuan</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <a href=""><img src="./icons8-right-96.png" alt=""></a>
                </div>
            </div>
        </div>
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