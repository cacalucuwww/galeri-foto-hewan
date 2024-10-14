<?php
// Koneksi ke database
include 'db.php'; // File koneksi database

// Query untuk mendapatkan data galeri
$query = "SELECT * FROM galeri_foto";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Galeri Foto Hewan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Data Galeri Foto</h2>

    <!-- Tombol untuk menambah data baru -->
    <a href="tambah.php" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Tambah Data</a>
    <br><br>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Nama User</th>
            <th>Nama Foto</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php
        // Nomor urut data
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['kategori']; ?></td>
            <td><?php echo $row['nama_user']; ?></td>
            <td><?php echo $row['nama_foto']; ?></td>
            <td><?php echo $row['deskripsi']; ?></td>
            <td><img src="uploads/<?php echo $row['gambar']; ?>" width="100" height="100"></td>
            <td><?php echo $row['status']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> || 
                <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
