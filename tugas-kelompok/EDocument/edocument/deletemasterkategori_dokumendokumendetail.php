<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
$No_Dokumen = mysqli_real_escape_string($con, $_REQUEST[No_Dokumen]);
$result = mysqli_query($con, "DELETE FROM dokumen WHERE No_Dokumen = '". $No_Dokumen . "'");
header("Location:listmasterkategori_dokumendokumendetail.php?Kode=$_GET[Kode]");
mysqli_close($con);
?>
