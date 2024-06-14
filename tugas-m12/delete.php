<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Kode_Barang = $_POST['Kode_Barang'];
    $sql = "DELETE FROM barang WHERE Kode_Barang = :Kode_Barang";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['Kode_Barang' => $Kode_Barang]);
    header("Location: index.php");
    exit;
}

$Kode_Barang = $_GET['Kode_Barang'];
$sql = "SELECT * FROM barang WHERE Kode_Barang = :Kode_Barang";
$stmt = $pdo->prepare($sql);
$stmt->execute(['Kode_Barang' => $Kode_Barang]);
$barang = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$barang) {
    die("Barang tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hapus Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Hapus Barang</h2>
    <p>Apakah Anda yakin ingin menghapus barang berikut?</p>
    <table class="table table-bordered">
        <tr>
            <th>Kode Barang</th>
            <td><?php echo htmlspecialchars($barang['Kode_Barang']); ?></td>
        </tr>
        <tr>
            <th>Nama</th>
            <td><?php echo htmlspecialchars($barang['Nama']); ?></td>
        </tr>
        <tr>
            <th>Kode Jenis</th>
            <td><?php echo htmlspecialchars($barang['Kode_Jenis']); ?></td>
        </tr>
        <tr>
            <th>Harga Beli</th>
            <td><?php echo htmlspecialchars($barang['Harga_Beli']); ?></td>
        </tr>
        <tr>
            <th>Harga Jual</th>
            <td><?php echo htmlspecialchars($barang['Harga_Jual']); ?></td>
        </tr>
        <tr>
            <th>Stok</th>
            <td><?php echo htmlspecialchars($barang['Stok']); ?></td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td><?php echo htmlspecialchars($barang['Keterangan']); ?></td>
        </tr>
        <tr>
            <th>Foto</th>
            <td><img src="uploads/<?php echo htmlspecialchars($barang['Foto']); ?>" width="100"></td>
        </tr>
        <tr>
            <th>Brosur</th>
            <td><a href="uploads/<?php echo htmlspecialchars($barang['Brosur']); ?>" target="_blank">Lihat Brosur</a></td>
        </tr>
    </table>
    <form method="post" action="delete.php">
        <input type="hidden" name="Kode_Barang" value="<?php echo htmlspecialchars($barang['Kode_Barang']); ?>">
        <button type="submit" class="btn btn-danger">Hapus</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
