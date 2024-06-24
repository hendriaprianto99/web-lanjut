<?php
// Include koneksi ke database
include("conn.php");

// Ambil data dari form
$kode_pembelian = $_POST['Kode_Pembelian'];
$tanggal = $_POST['Tanggal'];
$kode_supplier = $_POST['Kode_Supplier'];
$total_harga = $_POST['Total_Harga'];

// Data untuk tabel pembelian (master)
$sql_pembelian = "INSERT INTO pembelian (Kode_Pembelian, Tanggal, Kode_Supplier, Total_Harga) VALUES (:kode_pembelian, :tanggal, :kode_supplier, :total_harga)";
$stmt_pembelian = $conn->prepare($sql_pembelian);
$stmt_pembelian->bindParam(':kode_pembelian', $kode_pembelian);
$stmt_pembelian->bindParam(':tanggal', $tanggal);
$stmt_pembelian->bindParam(':kode_supplier', $kode_supplier);
$stmt_pembelian->bindParam(':total_harga', $total_harga);

// Eksekusi query untuk tabel pembelian (master)
if ($stmt_pembelian->execute()) {
    // Ambil data untuk detail pembelian dari form
    $kode_barangs = $_POST['Kode_Barang'];
    $jumlahs = $_POST['Jumlah'];
    $hargas = $_POST['Harga'];
    $totals = $_POST['Total'];

    // Data untuk tabel detail_pembelian
    $sql_detail_pembelian = "INSERT INTO detail_pembelian (Kode_Detail_Pembelian, Kode_Pembelian, Kode_Barang, Jumlah, Harga, Total) VALUES (:kode_detail_pembelian, :kode_pembelian, :kode_barang, :jumlah, :harga, :total)";
    $stmt_detail_pembelian = $conn->prepare($sql_detail_pembelian);

    // Iterasi untuk setiap barang yang dibeli
    for ($i = 0; $i < count($kode_barangs); $i++) {
        $kode_detail_pembelian = uniqid('DPB'); // Generate kode detail pembelian
        $kode_barang = $kode_barangs[$i];
        $jumlah = $jumlahs[$i];
        $harga = $hargas[$i];
        $total = $totals[$i];

        // Bind parameter untuk tabel detail_pembelian
        $stmt_detail_pembelian->bindParam(':kode_detail_pembelian', $kode_detail_pembelian);
        $stmt_detail_pembelian->bindParam(':kode_pembelian', $kode_pembelian);
        $stmt_detail_pembelian->bindParam(':kode_barang', $kode_barang);
        $stmt_detail_pembelian->bindParam(':jumlah', $jumlah);
        $stmt_detail_pembelian->bindParam(':harga', $harga);
        $stmt_detail_pembelian->bindParam(':total', $total);

        // Eksekusi query untuk tabel detail_pembelian
        $stmt_detail_pembelian->execute();
    }

    // Redirect ke halaman sukses jika berhasil
    header('Location: transaksi.php');
    exit();
} else {
    // Redirect ke halaman gagal jika terjadi kesalahan
    header('Location: transaksi_gagal.php');
    exit();
}
?>
