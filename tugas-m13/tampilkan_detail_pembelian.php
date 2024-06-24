<?php
include 'koneksi.php';

// Query untuk mendapatkan data pembelian
$sql_pembelian = "SELECT * FROM pembelian";
$result_pembelian = $conn->query($sql_pembelian);

if ($result_pembelian->num_rows > 0) {
    while($row_pembelian = $result_pembelian->fetch_assoc()) {
        echo "<h2>Pembelian: " . $row_pembelian['Kode_Pembelian'] . "</h2>";
        
        // Query untuk mendapatkan detail pembelian berdasarkan kode pembelian
        $sql_detail_pembelian = "SELECT * FROM detail_pembelian WHERE Kode_Pembelian = '" . $row_pembelian['Kode_Pembelian'] . "'";
        $result_detail_pembelian = $conn->query($sql_detail_pembelian);
        
        if ($result_detail_pembelian->num_rows > 0) {
            echo "<ul>";
            while($row_detail_pembelian = $result_detail_pembelian->fetch_assoc()) {
                echo "<li>Barang: " . $row_detail_pembelian['Kode_Barang'] . " - Jumlah: " . $row_detail_pembelian['Jumlah'] . " - Harga: " . $row_detail_pembelian['Harga'] . " - Total: " . $row_detail_pembelian['Total'] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "Tidak ada data detail pembelian.";
        }
    }
} else {
    echo "Tidak ada data pembelian.";
}

$conn->close();
?>
