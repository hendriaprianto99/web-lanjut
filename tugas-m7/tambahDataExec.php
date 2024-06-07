<?php

include 'db.php';

$NIM = mysqli_real_escape_string($conn, $_POST['NIM']);
$Nama = mysqli_real_escape_string($conn, $_POST['Nama']);
$Alamat = mysqli_real_escape_string($conn, $_POST['Alamat']);
$Program_studi = mysqli_real_escape_string($conn, $_POST['Program_studi']);

$query = "INSERT INTO mahasiswa (NIM, Nama, Alamat, Program_studi) VALUES ('$NIM', '$Nama', '$Alamat', '$Program_studi')";

if(mysqli_query($conn, $query)) {
    header("Location: listMahasiswa.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
