<?php
include 'koneksi.php';

// Query untuk mendapatkan data supplier
$sql_supplier = "SELECT * FROM supplier";
$result_supplier = $conn->query($sql_supplier);

if ($result_supplier->num_rows > 0) {
    while($row_supplier = $result_supplier->fetch_assoc()) {
        echo "<h2>Supplier: " . $row_supplier['Nama'] . "</h2>";
        
        // Query untuk mendapatkan data pembelian berdasarkan kode supplier
        $sql_pembelian = "SELECT * FROM pembelian WHERE Kode_Supplier = '" . $row_supplier['Kode_Supplier'] . "'";
        $result_pembelian = $conn->query($sql_pembelian);
        
        if ($result_pembelian->num_rows > 0) {
            echo "<ul>";
            while($row_pembelian = $result_pembelian->fetch_assoc()) {
                echo "<li>Pembelian: " . $row_pembelian['Kode_Pembelian'] . " - Tanggal: " . $row_pembelian['Tanggal'] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "Tidak ada data pembelian.";
        }
    }
} else {
    echo "Tidak ada data supplier.";
}

$conn->close();
?>
