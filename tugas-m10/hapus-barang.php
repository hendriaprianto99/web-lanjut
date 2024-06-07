<?php
include('conn.php');
$Kode = $_GET['Kode'];

$query = "DELETE FROM barang WHERE Kode = '$Kode'";
if ($connection->query($query)) {
    header("Location: index.php");
} else {
    echo "Data Gagal Dihapus!";
}
?>
