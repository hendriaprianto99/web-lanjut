<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
include("tulislog.php");
$id= mysqli_real_escape_string($con, $_POST["id"]);
$No_Dokumen= mysqli_real_escape_string($con, $_POST["No_Dokumen"]);
$File= mysqli_real_escape_string($con, $_POST["File"]);

if (isset($id) && isset($No_Dokumen) && isset($File)){
mysqli_query($con, "INSERT INTO dokumen_file(id,No_Dokumen,File) VALUES (null,'$No_Dokumen','$File')");
}

tulislog("insert into dokumen_file", $con); 
header("Location: listdokumen_file.php");
mysqli_close($con)
?>
