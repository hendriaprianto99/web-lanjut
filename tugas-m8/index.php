<?php
// Fungsi untuk membaca data dari file JSON
function bacaFileJSON($namaFile) {
    $data = file_get_contents($namaFile);
    return json_decode($data, true);
}

// Fungsi untuk menulis data ke file JSON
function tulisFileJSON($namaFile, $data) {
    $json_data = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($namaFile, $json_data);
}

// Baca data dari file JSON
$namaFile = 'data.json';
$data = bacaFileJSON($namaFile);

// Jika tombol hapus ditekan
if (isset($_POST['hapus'])) {
    $index = $_POST['index'];
    array_splice($data, $index, 1);
    tulisFileJSON($namaFile, $data);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Jika tombol edit ditekan
if (isset($_POST['edit'])) {
    $index = $_POST['index'];
    // Proses edit data dapat dilakukan di sini
    // Contoh: Mengarahkan pengguna ke halaman edit dengan menggunakan URL parameter
    header("Location: edit.php?index=$index");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data JSON</title>
    <style>
        body {
            font-family: Verdana, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h2>Data JSON</h2><br>
<button><a style="text-decoration:none" href=tambah_json.php>Tambah Data</a></button><br><br>
<table>
    <tr>
        <th>Nama</th>
        <th>Usia</th>
        <th>Kota</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($data as $index => $item): ?>
        <tr>
            <td><?php echo $item['nama']; ?></td>
            <td><?php echo $item['usia']; ?></td>
            <td><?php echo $item['kota']; ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="index" value="<?php echo $index; ?>">
                    <button type="submit" name="hapus">Hapus</button>
                    <button type="submit" name="edit">Edit</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
