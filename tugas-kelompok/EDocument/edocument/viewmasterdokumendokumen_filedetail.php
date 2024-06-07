<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php     
include("db.php");  
include("header.php"); 
include("menu.php"); 
include("tulislog.php"); 
?>      
<div id="page-wrapper">
<?php
echo "<td bgcolor=F5F5F5 valign=top>";
echo "<div class='table-responsive'> "; 
echo "<table class='table table-striped'>"; 
echo "<tr><td colspan=2><font face=Verdana color=black size=1>dokumen_file</font></td></tr>";
if(isset($_GET['id'])){$result = mysqli_query($con, "SELECT * FROM dokumen_file where dokumen_file.id=".mysqli_real_escape_string($con, $_GET['id']));}
while($row = mysqli_fetch_array($result))
{
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>id</font></td>";
echo "<td bgcolor=CCEEEE><font face=Verdana color=black size=1>" . $row['id'] . "</font></td>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>No_Dokumen</font></td>";
  echo "<td bgcolor=CCEEEE><font face=Verdana color=black size=1>" . $row['No_Dokumen'] . "<br>";
  $l = mysqli_query($con, "select Judul from dokumen where Judul = '". $row['No_Dokumen'] ."'"); 
  while($rl = mysqli_fetch_array($l)){  
    echo $rl[0];    
  } 
  echo "</font></td></tr>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>File</font></td>";
  echo "<td bgcolor=CCEEEE><font face=Verdana color=black size=1><a href='files/" . $row['File'] . "' target=_blank>" . $row['File'] . "</a></font></td>";
echo "<tr><td colspan=2 align=center><a href=listmasterdokumendokumen_filedetail.php?No_Dokumen=$_GET[No_Dokumen]><button type='button' class='btn btn-warning'><font face=Verdana size=1><i class='fa fa-check'></i>&nbsp;Back</font></button></a></td></tr>";
echo "</table><br>";
echo "</div>"; 
}
 tulislog("view dokumen_file", $con); 
 ?>   
 </div> 
 <?php 
include("footer.php");
?>
