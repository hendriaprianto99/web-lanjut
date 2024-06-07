<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php include("db.php"); ?>
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='jenis_pengguna' and user = '". $_SESSION['Email'] ."' and deleteData='1'";
$r = mysqli_query($con, $q);
if ( $obj = @mysqli_fetch_object($r) )
 {
?>
<?php
include("tulislog.php");
$Jenis_Pengguna = mysqli_real_escape_string($con, $_REQUEST[Jenis_Pengguna]);
$result = mysqli_query($con, "DELETE FROM jenis_pengguna WHERE Jenis_Pengguna = '". $Jenis_Pengguna . "'");
 tulislog("delete jenis_pengguna", $con); 
header("Location:listjenis_pengguna.php");
mysqli_close($con);
?>
<?php
} else {
 header("Location:content.php");
}
?>
