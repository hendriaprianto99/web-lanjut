<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
$id = mysqli_real_escape_string($con, $_REQUEST[id]);
$result = mysqli_query($con, "DELETE FROM dokumen_file WHERE id = '". $id . "'");
header("Location:listmasterdokumendokumen_filedetail.php?No_Dokumen=$_GET[No_Dokumen]");
mysqli_close($con);
?>
