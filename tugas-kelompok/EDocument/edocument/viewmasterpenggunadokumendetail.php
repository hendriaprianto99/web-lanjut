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
echo "<tr><td colspan=2><font face=Verdana color=black size=1>dokumen</font></td></tr>";
if(isset($_GET['No_Dokumen'])){$result = mysqli_query($con, "SELECT * FROM dokumen where dokumen.No_Dokumen='".mysqli_real_escape_string($con, $_GET['No_Dokumen'])."'");}
while($row = mysqli_fetch_array($result))
{
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>No_Dokumen</font></td>";
echo "<td bgcolor=CCEEEE><font face=Verdana color=black size=1>" . $row['No_Dokumen'] . "</font></td>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>Kode</font></td>";
  echo "<td bgcolor=CCEEEE><font face=Verdana color=black size=1>" . $row['Kode'] . "<br>";
  $l = mysqli_query($con, "select Kategori from kategori_dokumen where Kategori = '". $row['Kode'] ."'"); 
  while($rl = mysqli_fetch_array($l)){  
    echo $rl[0];    
  } 
  echo "</font></td></tr>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>Judul</font></td>";
echo "<td bgcolor=CCEEEE><font face=Verdana color=black size=1>" . $row['Judul'] . "</font></td>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>Deskripsi</font></td>";
echo "<td bgcolor=CCEEEE><font face=Verdana color=black size=1>" . $row['Deskripsi'] . "</font></td>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>Tanggal_Pembuatan</font></td>";
echo "<td bgcolor=CCEEEE><font face=Verdana color=black size=1>" . $row['Tanggal_Pembuatan'] . "</font></td>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>Tanggal_Modifikasi</font></td>";
echo "<td bgcolor=CCEEEE><font face=Verdana color=black size=1>" . $row['Tanggal_Modifikasi'] . "</font></td>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>Kode_Pengguna</font></td>";
  echo "<td bgcolor=CCEEEE><font face=Verdana color=black size=1>" . $row['Kode_Pengguna'] . "<br>";
  $l = mysqli_query($con, "select Nama from pengguna where Nama = '". $row['Kode_Pengguna'] ."'"); 
  while($rl = mysqli_fetch_array($l)){  
    echo $rl[0];    
  } 
  echo "</font></td></tr>";
echo "<tr><td colspan=2 align=center><a href=listmasterpenggunadokumendetail.php?Kode_Pengguna=$_GET[Kode_Pengguna]><button type='button' class='btn btn-warning'><font face=Verdana size=1><i class='fa fa-check'></i>&nbsp;Back</font></button></a></td></tr>";
echo "</table><br>";
echo "</div>"; 
}
 tulislog("view dokumen", $con); 
 ?>   
 </div> 
 <?php 
include("footer.php");
?>
