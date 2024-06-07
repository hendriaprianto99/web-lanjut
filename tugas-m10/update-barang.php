<?php
include('conn.php');
$Kode = $_POST['Kode'];
$Nama = $_POST['Nama'];
$Harga = $_POST['Harga'];

$query = "UPDATE barang SET Nama = '$Nama', Harga = '$Harga' WHERE Kode = '$Kode'";
if ($connection->query($query)) {
    header("Location: index.php");
} else {
    echo "Data Gagal Diupdate!";
}
?>
