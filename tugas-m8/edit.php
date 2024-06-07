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

// Ambil index dari parameter URL
$index = $_GET['index'];

// Jika formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update data
    $data[$index]['nama'] = $_POST['nama'];
    $data[$index]['usia'] = $_POST['usia'];
    $data[$index]['kota'] = $_POST['kota'];
    // Tulis kembali ke file JSON
    tulisFileJSON($namaFile, $data);
    // Redirect kembali ke halaman utama
    echo "<script> location.href='index.php'; </script>";
}

// Ambil data yang akan diedit
$editData = $data[$index];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
<h2>Edit Data</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?index=" . $index; ?>">
    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama" value="<?php echo $editData['nama']; ?>" required><br>
    <label for="usia">Usia:</label><br>
    <input type="number" id="usia" name="usia" value="<?php echo $editData['usia']; ?>" required><br>
    <label for="kota">Kota:</label><br>
    <input type="text" id="kota" name="kota" value="<?php echo $editData['kota']; ?>" required><br><br>
    <input type="submit" value="Simpan Perubahan">
</form>
</body>
</html>
