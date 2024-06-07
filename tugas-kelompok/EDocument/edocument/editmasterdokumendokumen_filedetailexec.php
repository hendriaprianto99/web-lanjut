<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
$pk = mysqli_real_escape_string($con, $_POST["pk"]);
$id = mysqli_real_escape_string($con, $_POST["id"]);
$No_Dokumen = mysqli_real_escape_string($con, $_POST["No_Dokumen"]);
$File = mysqli_real_escape_string($con, $_POST["File"]);

mysqli_query($con, "update dokumen_file set id='$id', No_Dokumen='$No_Dokumen', File='$File' where id=$pk");
header("Location: listmasterdokumendokumen_filedetail.php?No_Dokumen=$No_Dokumen");
mysqli_close($con);
?>
