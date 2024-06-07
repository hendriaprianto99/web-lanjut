<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
$pk = mysqli_real_escape_string($con, $_POST["pk"]);
$No_Dokumen = mysqli_real_escape_string($con, $_POST["No_Dokumen"]);
$Kode = mysqli_real_escape_string($con, $_POST["Kode"]);
$Judul = mysqli_real_escape_string($con, $_POST["Judul"]);
$Deskripsi = mysqli_real_escape_string($con, $_POST["Deskripsi"]);
$Tanggal_Pembuatan = mysqli_real_escape_string($con, $_POST["Tanggal_Pembuatan"]);
$Tanggal_Modifikasi = mysqli_real_escape_string($con, $_POST["Tanggal_Modifikasi"]);
$Kode_Pengguna = mysqli_real_escape_string($con, $_POST["Kode_Pengguna"]);

mysqli_query($con, "update dokumen set No_Dokumen='$No_Dokumen', Kode='$Kode', Judul='$Judul', Deskripsi='$Deskripsi', Tanggal_Pembuatan='$Tanggal_Pembuatan', Tanggal_Modifikasi='$Tanggal_Modifikasi', Kode_Pengguna='$Kode_Pengguna' where No_Dokumen='$pk'");
header("Location: listmasterdokumendokumen_file.php");
mysqli_close($con);
?>
