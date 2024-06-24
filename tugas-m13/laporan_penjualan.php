<?php
include("header.php");
require 'conn.php';

echo '<div class="container-fluid">';
echo '<div class="row">';
echo '<nav class="col-md-2 sidebar">';
include("menu.php");
echo '</nav>';
echo '<main class="col-md-10 content">';
echo '<div class="card">';
echo '<div class="card-header">Laporan Penjualan</div>';
echo '<div class="card-body">';

// Form untuk filter laporan berdasarkan tanggal
echo '<form method="post" class="mb-4">';
echo '<div class="form-row">';
echo '<div class="col">';
echo '<input type="date" name="start_date" class="form-control" placeholder="Start Date">';
echo '</div>';
echo '<div class="col">';
echo '<input type="date" name="end_date" class="form-control" placeholder="End Date">';
echo '</div>';
echo '<div class="col">';
echo '<button type="submit" class="btn btn-primary">Filter</button>';
echo '</div>';
echo '</div>';
echo '</form>';

// Filter berdasarkan tanggal
$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '1970-01-01';
$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : date('Y-m-d');

// Query untuk mengambil data penjualan
$sql = "SELECT * FROM penjualan WHERE penjualan.Tanggal BETWEEN :start_date AND :end_date";

$stmt = $conn->prepare($sql);
$stmt->bindValue(':start_date', $start_date);
$stmt->bindValue(':end_date', $end_date);
$stmt->execute();
$sales = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($sales) {
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered table-striped">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th scope="col">Kode Penjualan</th>';
    echo '<th scope="col">Tanggal</th>';
    echo '<th scope="col">Kode Pelanggan</th>';
    echo '<th scope="col">Total Harga</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($sales as $sale) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($sale['Kode_Penjualan']) . '</td>';
        echo '<td>' . htmlspecialchars($sale['Tanggal']) . '</td>';
        echo '<td>' . htmlspecialchars($sale['Kode_Pelanggan']) . '</td>';
        echo '<td>' . htmlspecialchars($sale['Total_Harga']) . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo '<div class="alert alert-warning">No sales found for the selected date range.</div>';
}

echo '</div>';
echo '</div>';
echo '</main>';
echo '</div>';
echo '</div>';

include("footer.php");
?>
