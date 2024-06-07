<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
$Kode_Pengguna= mysqli_real_escape_string($con, $_POST["Kode_Pengguna"]);
$Nama= mysqli_real_escape_string($con, $_POST["Nama"]);
$Jenis_Pengguna= mysqli_real_escape_string($con, $_POST["Jenis_Pengguna"]);
$Email= mysqli_real_escape_string($con, $_POST["Email"]);
$Telepon= mysqli_real_escape_string($con, $_POST["Telepon"]);
$Foto= mysqli_real_escape_string($con, $_POST["Foto"]);

 mysqli_query($con, "INSERT INTO pengguna(Kode_Pengguna,Nama,Jenis_Pengguna,Email,Telepon,Foto) VALUES ('$Kode_Pengguna','$Nama','$Jenis_Pengguna','$Email','$Telepon','$Foto')");
header("Location: listmasterjenis_penggunapenggunadetail.php?Jenis_Pengguna=$Jenis_Pengguna");
mysqli_close($con)
?>
