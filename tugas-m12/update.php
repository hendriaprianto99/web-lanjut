<?php
require 'db.php';
$Kode_Barang = $_GET['Kode_Barang'];
$sql = "SELECT * FROM barang WHERE Kode_Barang = :Kode_Barang";
$stmt = $pdo->prepare($sql);
$stmt->execute(['Kode_Barang' => $Kode_Barang]);
$barang = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$barang) {
    die("Barang tidak ditemukan!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nama = $_POST['Nama'];
    $Kode_Jenis = $_POST['Kode_Jenis'];
    $Harga_Beli = $_POST['Harga_Beli'];
    $Harga_Jual = $_POST['Harga_Jual'];
    $Stok = $_POST['Stok'];
    $Keterangan = $_POST['Keterangan'];

    // Upload Foto
    if ($_FILES["Foto"]["name"]) {
        $target_dir = "uploads/";
        $Foto = $target_dir . basename($_FILES["Foto"]["name"]);
        move_uploaded_file($_FILES["Foto"]["tmp_name"], $Foto);
    } else {
        $Foto = $barang['Foto'];
    }

    // Upload Brosur
    if ($_FILES["Brosur"]["name"]) {
        $target_dir = "uploads/";
        $Brosur = $target_dir . basename($_FILES["Brosur"]["name"]);
        move_uploaded_file($_FILES["Brosur"]["tmp_name"], $Brosur);
    } else {
        $Brosur = $barang['Brosur'];
    }

    $sql = "UPDATE barang SET Nama = :Nama, Kode_Jenis = :Kode_Jenis, Harga_Beli = :Harga_Beli,
            Harga_Jual = :Harga_Jual, Stok = :Stok, Keterangan = :Keterangan,
            Foto = :Foto, Brosur = :Brosur WHERE Kode_Barang = :Kode_Barang";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'Nama' => $Nama,
        'Kode_Jenis' => $Kode_Jenis,
        'Harga_Beli' => $Harga_Beli,
        'Harga_Jual' => $Harga_Jual,
        'Stok' => $Stok,
        'Keterangan' => $Keterangan,
        'Foto' => basename($_FILES["Foto"]["name"]) ?: $barang['Foto'],
        'Brosur' => basename($_FILES["Brosur"]["name"]) ?: $barang['Brosur'],
        'Kode_Barang' => $Kode_Barang
    ]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Edit Barang</h2>
    <form action="update.php?Kode_Barang=<?php echo $Kode_Barang; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="Nama" class="form-control" value="<?php echo htmlspecialchars($barang['Nama']); ?>" required>
        </div>
        <div class="form-group">
            <label>Kode Jenis</label>
            <input type="text" name="Kode_Jenis" class="form-control" value="<?php echo htmlspecialchars($barang['Kode_Jenis']); ?>" required>
        </div>
        <div class="form-group">
            <label>Harga Beli</label>
            <input type="number" name="Harga_Beli" class="form-control" value="<?php echo htmlspecialchars($barang['Harga_Beli']); ?>" required>
        </div>
        <div class="form-group">
            <label>Harga Jual</label>
            <input type="number" name="Harga_Jual" class="form-control" value="<?php echo htmlspecialchars($barang['Harga_Jual']); ?>" required>
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="Stok" class="form-control" value="<?php echo htmlspecialchars($barang['Stok']); ?>" required>
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="Keterangan" class="form-control" required><?php echo htmlspecialchars($barang['Keterangan']); ?></textarea>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="Foto" class="form-control">
            <img src="uploads/<?php echo htmlspecialchars($barang['Foto']); ?>" width="50">
        </div>
        <div class="form-group">
            <label>Brosur</label>
            <input type="file" name="Brosur" class="form-control">
            <a href="uploads/<?php echo htmlspecialchars($barang['Brosur']); ?>" target="_blank">Lihat Brosur</a>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
