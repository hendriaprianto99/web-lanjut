<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
include("tulislog.php");
$pk = mysqli_real_escape_string($con, $_POST["pk"]);
$Kode_Pengguna = mysqli_real_escape_string($con, $_POST["Kode_Pengguna"]);
$Nama = mysqli_real_escape_string($con, $_POST["Nama"]);
$Jenis_Pengguna = mysqli_real_escape_string($con, $_POST["Jenis_Pengguna"]);
$Email = mysqli_real_escape_string($con, $_POST["Email"]);
$Telepon = mysqli_real_escape_string($con, $_POST["Telepon"]);
$Foto = mysqli_real_escape_string($con, $_POST["Foto"]);

mysqli_query($con, "update pengguna set Kode_Pengguna='$Kode_Pengguna', Nama='$Nama', Jenis_Pengguna='$Jenis_Pengguna', Email='$Email', Telepon='$Telepon', Foto='$Foto' where Kode_Pengguna='$pk'");
 tulislog("update pengguna", $con); 
header("Location: listpengguna.php");
mysqli_close($con);
?>
