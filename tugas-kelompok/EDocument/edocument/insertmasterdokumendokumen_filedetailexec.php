<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
$id= mysqli_real_escape_string($con, $_POST["id"]);
$No_Dokumen= mysqli_real_escape_string($con, $_POST["No_Dokumen"]);
$File= mysqli_real_escape_string($con, $_POST["File"]);

 mysqli_query($con, "INSERT INTO dokumen_file(id,No_Dokumen,File) VALUES (null,'$No_Dokumen','$File')");
header("Location: listmasterdokumendokumen_filedetail.php?No_Dokumen=$No_Dokumen");
mysqli_close($con)
?>
