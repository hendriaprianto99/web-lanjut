<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php include("db.php"); ?>
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='dokumen' and user = '". $_SESSION['Email'] ."' and deleteData='1'";
$r = mysqli_query($con, $q);
if ( $obj = @mysqli_fetch_object($r) )
 {
?>
<?php
include("tulislog.php");
$No_Dokumen = mysqli_real_escape_string($con, $_REQUEST[No_Dokumen]);
$result = mysqli_query($con, "DELETE FROM dokumen WHERE No_Dokumen = '". $No_Dokumen . "'");
 tulislog("delete dokumen", $con); 
header("Location:listdokumen.php");
mysqli_close($con);
?>
<?php
} else {
 header("Location:content.php");
}
?>
