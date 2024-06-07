<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php include("db.php"); ?>
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='kategori_dokumen' and user = '". $_SESSION['Email'] ."' and deleteData='1'";
$r = mysqli_query($con, $q);
if ( $obj = @mysqli_fetch_object($r) )
 {
?>
<?php
include("tulislog.php");
$Kode = mysqli_real_escape_string($con, $_REQUEST[Kode]);
$result = mysqli_query($con, "DELETE FROM kategori_dokumen WHERE Kode = '". $Kode . "'");
 tulislog("delete kategori_dokumen", $con); 
header("Location:listkategori_dokumen.php");
mysqli_close($con);
?>
<?php
} else {
 header("Location:content.php");
}
?>
