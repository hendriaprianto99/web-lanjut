<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
$Kode= mysqli_real_escape_string($con, $_POST["Kode"]);
$Kategori= mysqli_real_escape_string($con, $_POST["Kategori"]);
$Keterangan= mysqli_real_escape_string($con, $_POST["Keterangan"]);


if ($Kode!= ""){
 mysqli_query($con, "INSERT INTO kategori_dokumen(Kode,Kategori,Keterangan) VALUES ('$Kode','$Kategori','$Keterangan')");
}
header("Location: listmasterkategori_dokumendokumen.php");
mysqli_close($con)
?>
