<?php
    session_start();
    if($_SESSION['status_login'] != true || $_SESSION['a_global']->level != 'user'){
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard User | Web Galeri Foto Hewan</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>User Dashboard</h1>
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="galeri.php">Lihat Galeri</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="logout.php">Logout</a></li>


            </ul>
        </div>
    </header>

    <div class="section">
        <div class="container">
            <h3>Selamat datang di Dashboard User, <?php echo $_SESSION['a_global']->admin_name; ?></h3>
            <p>Di sini Anda dapat melihat galeri foto hewan yang tersedia, mengedit profil, atau logout dari sistem.</p>
        </div>
    </div>

    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Web Galeri Foto Hewan.</small>
        </div>
    </footer>
</body>
</html>
