<?php
session_start();
include 'db.php';  // Koneksi ke database

// Cek apakah pengguna sudah login
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

// Ambil ID foto dari URL
$image_id = $_GET['id'];

// Cek apakah ID foto valid
if ($image_id) {
    // Ambil data foto berdasarkan ID
    $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_id = '$image_id'");
    
    // Jika data foto ditemukan
    if (mysqli_num_rows($foto) > 0) {
        $row = mysqli_fetch_assoc($foto);
        $current_likes = $row['likes'];  // Ambil jumlah "likes" saat ini
        
        // Tambah jumlah "likes" dengan 1
        $new_likes = $current_likes + 1;
        
        // Update jumlah "likes" di database
        $update_likes = mysqli_query($conn, "UPDATE tb_image SET likes = '$new_likes' WHERE image_id = '$image_id'");
        
        // Jika update berhasil, arahkan kembali ke halaman detail foto
        if ($update_likes) {
            echo '<script>alert("Foto berhasil di-like!"); window.location="detail-image.php?id=' . $image_id . '"</script>';
        } else {
            echo '<script>alert("Gagal melakukan like!"); window.location="detail-image.php?id=' . $image_id . '"</script>';
        }
    } else {
        echo '<script>alert("Foto tidak ditemukan!"); window.location="galeri.php"</script>';
    }
} else {
    echo '<script>alert("ID foto tidak valid!"); window.location="galeri.php"</script>';
}
?>
