<?php
    error_reporting(0);
    include 'db.php';
	$kontak = mysqli_query($conn, "SELECT telpon, email, alamat FROM tb_admin WHERE admin_id = 2");
	$a = mysqli_fetch_object($kontak);
	
	$produk = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEB GALERI FOTO HEWAN</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
        <h1><a href="index.php">WEB GALERI FOTO HEWAN</a></h1>
        <ul>
            <li><a href="galeri.php">Galeri</a></li>
           <li><a href="registrasi.php">Registrasi</a></li>
           <li><a href="login.php">Login</a></li>
        </ul>
        </div>
    </header>
    
    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="galeri.php">
                <input type="text" name="search" placeholder="Cari Foto" value="<?php echo $_GET['search'] ?>" />
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>" />
                <input type="submit" name="cari" value="Cari Foto" />
            </form>
        </div>
    </div>
    
    <!-- product detail -->
    <div class="section">
        <div class="container">
             <h3>Detail Foto</h3>
            <div class="box">
                <div class="col-2">
                   <img src="foto/<?php echo $p->image_file ?>" width="100%" /> 
                </div>
                <div class="col-2">
                   <h3><?php echo $p->image_name ?><br />Kategori : <?php echo $p->category_name  ?></h3>
                   <h4>Nama User : <?php echo $p->nama ?><br />
                   Upload Pada Tanggal : <?php echo $p->created_at  ?></h4>
                   <p>Deskripsi :<br />
                        <?php echo $p->description ?>

                        <!-- Tambahkan button Like di bawah deskripsi foto -->
<form action="like.php" method="GET">
    <input type="hidden" name="id" value="<?php echo $p->image_id; ?>">
    <button type="submit" class="like-button">👍 Like</button>
</form>
<p>Jumlah Like: <?php echo $p->likes; ?></p>



<!-- Form untuk menambah komentar -->
<h3>Tambahkan Komentar</h3>
<form action="komentar.php" method="POST">
    <input type="hidden" name="foto_id" value="<?php echo $p->image_id; ?>">
    <textarea name="komentar" rows="4" cols="50" placeholder="Tulis komentar Anda..." required></textarea><br><br>
    <input type="submit" value="Kirim Komentar">
</form>

<!-- Tampilkan komentar yang sudah ada -->
<h3>Komentar:</h3>
<?php
$query_komentar = mysqli_query($conn, "SELECT * FROM komentar WHERE image_id = ".$p->image_id." ORDER BY tanggal DESC");
while($kom = mysqli_fetch_assoc($query_komentar)) {
    echo "<p>".$kom['komentar']." - <i>".$kom['tanggal']."</i></p><hr>";


}
?>

                   </p>

                   </p>
                   
                </div>
            </div>
        </div>
    </div>
    
    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Web Galeri Foto Hewan.</small>
        </div>
    </footer>
</body>
</html>