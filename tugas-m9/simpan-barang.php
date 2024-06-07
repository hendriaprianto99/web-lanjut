<?php
// Include koneksi database
include('conn.php');

// Get data dari form
$Kode = $_POST['Kode'];
$Nama = $_POST['Nama'];
$Harga = $_POST['Harga'];

// Query insert data ke dalam database
$query = "INSERT INTO barang (Kode, Nama, Harga) VALUES ('$Kode', '$Nama', $Harga)";

// Kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if ($connection->query($query)) {
    // Redirect ke halaman index.php
    header("location: index.php");
} else {
    // Pesan error gagal insert data
    echo "Data Gagal Disimpan!";
}
?>
