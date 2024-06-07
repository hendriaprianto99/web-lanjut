<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php include("db.php"); ?>
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='pengguna/dokumen' and user = '". $_SESSION['Email'] ."' and deleteData='1'";
$r = mysqli_query($con, $q);
if ( $obj = @mysqli_fetch_object($r) )
 {
?>
<?php
$Kode_Pengguna = mysqli_real_escape_string($con, $_REQUEST[Kode_Pengguna]);
$result = mysqli_query($con, "DELETE FROM pengguna WHERE Kode_Pengguna = '". $Kode_Pengguna . "'");
header("Location:listmasterpenggunadokumen.php");
mysqli_close($con);
?>
<?php
} else {
 header("Location:content.php");
}
?>
