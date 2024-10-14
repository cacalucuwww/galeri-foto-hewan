<?php
// Koneksi ke database
include 'db.php';

if(isset($_GET['id'])){
    $id_galeri = $_GET['id'];

    // Cari data galeri berdasarkan ID
    $query = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_id = '$id_galeri'");
    $galeri = mysqli_fetch_assoc($query);

    if($galeri){
        // Hapus file gambar dari direktori 'foto'
        if(file_exists('foto/'.$galeri['image_file'])){
            unlink('foto/'.$galeri['image_file']);
        }

        // Hapus data galeri dari database
        $delete = mysqli_query($conn, "DELETE FROM tb_image WHERE image_id = '$id_galeri'");

        if($delete){
            echo '<script>alert("Galeri berhasil dihapus");</script>';
            echo '<script>window.location="galeri.php";</script>';
        } else {
            echo 'Gagal menghapus galeri: '.mysqli_error($conn);
        }
    } else {
        echo '<script>alert("Galeri tidak ditemukan!");</script>';
        echo '<script>window.location="galeri.php";</script>';
    }
}
?>
