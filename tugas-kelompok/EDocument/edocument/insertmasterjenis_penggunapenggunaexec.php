<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
$Jenis_Pengguna= mysqli_real_escape_string($con, $_POST["Jenis_Pengguna"]);
$Keterangan= mysqli_real_escape_string($con, $_POST["Keterangan"]);


if ($Jenis_Pengguna!= ""){
 mysqli_query($con, "INSERT INTO jenis_pengguna(Jenis_Pengguna,Keterangan) VALUES ('$Jenis_Pengguna','$Keterangan')");
}
header("Location: listmasterjenis_penggunapengguna.php");
mysqli_close($con)
?>
