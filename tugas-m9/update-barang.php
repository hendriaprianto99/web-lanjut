<?php
// Include koneksi database
include('conn.php');

// Get data dari form
$Kode = $_POST['Kode'];
$Nama = $_POST['Nama'];
$Harga = $_POST['Harga'];

// Query update data ke dalam database berdasarkan Kode
$query = "UPDATE barang SET Nama = '$Nama', Harga = '$Harga' WHERE Kode = '$Kode'";

// Kondisi pengecekan apakah data berhasil diupdate atau tidak
if ($connection->query($query)) {
    // Redirect ke halaman index.php
    header("location: index.php");
} else {
    // Pesan error gagal update data
    echo "Data Gagal Diupdate!";
}
?>
