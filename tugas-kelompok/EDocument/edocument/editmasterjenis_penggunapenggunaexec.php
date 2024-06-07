<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
$pk = mysqli_real_escape_string($con, $_POST["pk"]);
$Jenis_Pengguna = mysqli_real_escape_string($con, $_POST["Jenis_Pengguna"]);
$Keterangan = mysqli_real_escape_string($con, $_POST["Keterangan"]);

mysqli_query($con, "update jenis_pengguna set Jenis_Pengguna='$Jenis_Pengguna', Keterangan='$Keterangan' where Jenis_Pengguna='$pk'");
header("Location: listmasterjenis_penggunapengguna.php");
mysqli_close($con);
?>
