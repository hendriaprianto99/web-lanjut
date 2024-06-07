<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="hendri.css">
</head>
<body>

<form action="tambahDataExec.php" method="post">
    <table border="1">
        <tr>
            <td colspan="2">Tambah Data Mahasiswa</td>
        </tr>
        <tr>
            <td>NIM</td>
            <td><input type="text" name="NIM" size="25"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="Nama" size="25"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><textarea name="Alamat" cols="70" rows="5"></textarea></td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>
                <select name="Program_studi">
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Simpan"></td>
        </tr>
    </table>
</form>

</body>
</html>
