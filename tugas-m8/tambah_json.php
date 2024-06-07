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

// Jika formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Baca data dari file JSON
    $namaFile = 'data.json';
    $data = bacaFileJSON($namaFile);
    // Tambahkan data baru
    $baru = array(
        'nama' => $_POST['nama'],
        'usia' => $_POST['usia'],
        'kota' => $_POST['kota']
    );
    $data[] = $baru;
    // Tulis kembali ke file JSON
    tulisFileJSON($namaFile, $data);

    echo "<script> location.href='index.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data</title>
</head>
<body>
<h2>Form Tambah Data</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama" required><br>
    <label for="usia">Usia:</label><br>
    <input type="number" id="usia" name="usia" required><br>
    <label for="kota">Kota:</label><br>
    <input type="text" id="kota" name="kota" required><br><br>
    <input type="submit" value="Tambah Data">
</form>
</body>
</html>
