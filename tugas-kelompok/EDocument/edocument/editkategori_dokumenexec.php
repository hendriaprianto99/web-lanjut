<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
include("tulislog.php");
$pk = mysqli_real_escape_string($con, $_POST["pk"]);
$Kode = mysqli_real_escape_string($con, $_POST["Kode"]);
$Kategori = mysqli_real_escape_string($con, $_POST["Kategori"]);
$Keterangan = mysqli_real_escape_string($con, $_POST["Keterangan"]);

mysqli_query($con, "update kategori_dokumen set Kode='$Kode', Kategori='$Kategori', Keterangan='$Keterangan' where Kode='$pk'");
 tulislog("update kategori_dokumen", $con); 
header("Location: listkategori_dokumen.php");
mysqli_close($con);
?>
