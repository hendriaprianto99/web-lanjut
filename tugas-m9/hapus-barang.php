<?php
include('conn.php');

// Get id
$Kode = $_GET['Kode'];

$query = "DELETE FROM barang WHERE Kode = '$Kode'";

if ($connection->query($query)) {
    header("location: index.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}
?>
