<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
include("tulislog.php");
$No_Dokumen= mysqli_real_escape_string($con, $_POST["No_Dokumen"]);
$Kode= mysqli_real_escape_string($con, $_POST["Kode"]);
$Judul= mysqli_real_escape_string($con, $_POST["Judul"]);
$Deskripsi= mysqli_real_escape_string($con, $_POST["Deskripsi"]);
$Tanggal_Pembuatan= mysqli_real_escape_string($con, $_POST["Tanggal_Pembuatan"]);
$Tanggal_Modifikasi= mysqli_real_escape_string($con, $_POST["Tanggal_Modifikasi"]);
$Kode_Pengguna= mysqli_real_escape_string($con, $_POST["Kode_Pengguna"]);

if (isset($No_Dokumen) && isset($Kode) && isset($Judul) && isset($Deskripsi) && isset($Tanggal_Pembuatan) && isset($Tanggal_Modifikasi) && isset($Kode_Pengguna)){
mysqli_query($con, "INSERT INTO dokumen(No_Dokumen,Kode,Judul,Deskripsi,Tanggal_Pembuatan,Tanggal_Modifikasi,Kode_Pengguna) VALUES ('$No_Dokumen','$Kode','$Judul','$Deskripsi','$Tanggal_Pembuatan','$Tanggal_Modifikasi','$Kode_Pengguna')");
}

tulislog("insert into dokumen", $con); 
header("Location: listdokumen.php");
mysqli_close($con)
?>
