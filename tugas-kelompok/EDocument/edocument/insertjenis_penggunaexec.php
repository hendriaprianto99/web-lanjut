<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
include("tulislog.php");
$Jenis_Pengguna= mysqli_real_escape_string($con, $_POST["Jenis_Pengguna"]);
$Keterangan= mysqli_real_escape_string($con, $_POST["Keterangan"]);

if (isset($Jenis_Pengguna) && isset($Keterangan)){
mysqli_query($con, "INSERT INTO jenis_pengguna(Jenis_Pengguna,Keterangan) VALUES ('$Jenis_Pengguna','$Keterangan')");
}

tulislog("insert into jenis_pengguna", $con); 
header("Location: listjenis_pengguna.php");
mysqli_close($con)
?>
