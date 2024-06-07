<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
$Kode_Pengguna = mysqli_real_escape_string($con, $_REQUEST[Kode_Pengguna]);
$result = mysqli_query($con, "DELETE FROM pengguna WHERE Kode_Pengguna = '". $Kode_Pengguna . "'");
header("Location:listmasterjenis_penggunapenggunadetail.php?Jenis_Pengguna=$_GET[Jenis_Pengguna]");
mysqli_close($con);
?>
