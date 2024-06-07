<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
include("tulislog.php");
$Kode= mysqli_real_escape_string($con, $_POST["Kode"]);
$Kategori= mysqli_real_escape_string($con, $_POST["Kategori"]);
$Keterangan= mysqli_real_escape_string($con, $_POST["Keterangan"]);

if (isset($Kode) && isset($Kategori) && isset($Keterangan)){
mysqli_query($con, "INSERT INTO kategori_dokumen(Kode,Kategori,Keterangan) VALUES ('$Kode','$Kategori','$Keterangan')");
}

tulislog("insert into kategori_dokumen", $con); 
header("Location: listkategori_dokumen.php");
mysqli_close($con)
?>
