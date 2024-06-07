<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Lanjut | List Mahasiswa</title>
    <link rel="stylesheet" href="hendri.css">
</head>
<body>

<?php
    include 'db.php';

    if(mysqli_connect_error()) {
        echo "Koneksi Gagal!" . mysqli_connect_error();
    } else {
        // echo "Koneksi Berhasil";
    }
?>

<a href="tambahData.php">
    <input type="button" value="Tambah Data"></br></br> 
</a>

<table border="1" cellspacing="10" cellpadding="10">
    <tr bgcolor="D3DCE3">
        <th>Aksi</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Program Studi</th>
    </tr>
    
    <?php
    $query = "SELECT * FROM mahasiswa";
    $result = mysqli_query($conn, $query);

    $warna = 0;

    while($row = mysqli_fetch_array($result)) {
        if($warna == 0) {
            echo "<tr bgcolor='E5E5E5' onMouseOver=\"this.bgColor='#888FF';\" onMouseOut=\"this.bgColor='E5E5E5';\">";
            $warna = 1;
        } else {
            echo "<tr bgcolor='D5D5D5' onMouseOver=\"this.bgColor='#888FF';\" onMouseOut=\"this.bgColor='D5D5D5';\">";
            $warna = 0;
        }
        
        echo "<td><a href='hapusData.php?id=".$row['NIM']."'>Hapus</a></td>";
        echo "<td>".$row['NIM']."</td>";
        echo "<td>".$row['Nama']."</td>";
        echo "<td>".$row['Alamat']."</td>";
        echo "<td>".$row['Program_studi']."</td>";
        
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
