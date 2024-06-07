<?php
include('conn.php');
$Kode = $_POST['Kode'];
$Nama = $_POST['Nama'];
$Harga = $_POST['Harga'];

$query = "INSERT INTO barang (Kode, Nama, Harga) VALUES ('$Kode', '$Nama', $Harga)";
if ($connection->query($query)) {
    header("Location: index.php");
} else {
    echo "Data Gagal Disimpan!";
}
?>
