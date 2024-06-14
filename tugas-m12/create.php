<?php
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Kode_Barang = $_POST['Kode_Barang'];
    $Nama = $_POST['Nama'];
    $Kode_Jenis = $_POST['Kode_Jenis'];
    $Harga_Beli = $_POST['Harga_Beli'];
    $Harga_Jual = $_POST['Harga_Jual'];
    $Stok = $_POST['Stok'];
    $Keterangan = $_POST['Keterangan'];

    // Upload Foto
    $target_dir = "uploads/";
    $Foto = $target_dir . basename($_FILES["Foto"]["name"]);
    move_uploaded_file($_FILES["Foto"]["tmp_name"], $Foto);

    // Upload Brosur
    $Brosur = $target_dir . basename($_FILES["Brosur"]["name"]);
    move_uploaded_file($_FILES["Brosur"]["tmp_name"], $Brosur);

    $sql = "INSERT INTO barang (Kode_Barang, Nama, Kode_Jenis, Harga_Beli, Harga_Jual, Stok, Keterangan, Foto, Brosur) 
            VALUES (:Kode_Barang, :Nama, :Kode_Jenis, :Harga_Beli, :Harga_Jual, :Stok, :Keterangan, :Foto, :Brosur)";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        'Kode_Barang' => $Kode_Barang,
        'Nama' => $Nama,
        'Kode_Jenis' => $Kode_Jenis,
        'Harga_Beli' => $Harga_Beli,
        'Harga_Jual' => $Harga_Jual,
        'Stok' => $Stok,
        'Keterangan' => $Keterangan,
        'Foto' => basename($_FILES["Foto"]["name"]),
        'Brosur' => basename($_FILES["Brosur"]["name"])
    ]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Tambah Barang</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Kode Barang</label>
            <input type="text" name="Kode_Barang" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="Nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Kode Jenis</label>
            <input type="text" name="Kode_Jenis" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Harga Beli</label>
            <input type="number" name="Harga_Beli" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Harga Jual</label>
            <input type="number" name="Harga_Jual" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="Stok" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="Keterangan" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="Foto" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Brosur</label>
            <input type="file" name="Brosur" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</body>
</html>
