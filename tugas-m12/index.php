<?php
require 'db.php';
$stmt = $pdo->query("SELECT * FROM barang");
$barang = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Daftar Barang</h2>
    <a href="create.php" class="btn btn-success mb-3">Tambah Barang</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Kode Barang</th>
            <th>Nama</th>
            <th>Kode Jenis</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Keterangan</th>
            <th>Foto</th>
            <th>Brosur</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($barang as $item): ?>
        <tr>
            <td><?php echo htmlspecialchars($item['Kode_Barang']); ?></td>
            <td><?php echo htmlspecialchars($item['Nama']); ?></td>
            <td><?php echo htmlspecialchars($item['Kode_Jenis']); ?></td>
            <td><?php echo htmlspecialchars($item['Harga_Beli']); ?></td>
            <td><?php echo htmlspecialchars($item['Harga_Jual']); ?></td>
            <td><?php echo htmlspecialchars($item['Stok']); ?></td>
            <td><?php echo htmlspecialchars($item['Keterangan']); ?></td>
            <td><img src="uploads/<?php echo htmlspecialchars($item['Foto']); ?>" width="50"></td>
            <td><a href="uploads/<?php echo htmlspecialchars($item['Brosur']); ?>" target="_blank">Lihat Brosur</a></td>
            <td>
                <div class="btn-group">
                    <a href="read.php?Kode_Barang=<?php echo $item['Kode_Barang']; ?>" class="btn btn-info">Detail</a>
                    <a href="update.php?Kode_Barang=<?php echo $item['Kode_Barang']; ?>" class="btn btn-warning">Edit</a>
                    <!-- <a href="delete.php?Kode_Barang=<?php echo $item['Kode_Barang']; ?>" class="btn btn-danger">Hapus</a> -->
                    <a href="delete.php?Kode_Barang=<?php echo $item['Kode_Barang']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">Hapus</a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
