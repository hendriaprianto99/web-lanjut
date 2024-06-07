<style> 
#laporan td, #laporan th {  
  border: 1px solid #ddd;  
  padding: 4px; 
}   
</style> 
<?php     
include("db.php");  
?>      
<div id="page-wrapper">

<?php
//ambil data setting  
$hset = mysqli_query($con ,"select * from setting");  
while($rset = mysqli_fetch_array($hset)){ 
	$Nama = $rset["Nama"]; 
	$Alamat = $rset["Alamat"]; 
	$Telepon = $rset["Telepon"];   
	$Logo = $rset["Logo"];  
} 
?> 
  
<table width=100%>  
<thead> 
  <tr>  
    <td rowspan="3" width=20% align=center><?php echo "<img src='images/" . $Logo . "' width=100 height=100><br>"; ?></td> 
    <td><font face=verdana size=5><?php echo $Nama; ?></font></td> 
  </tr> 
  <tr> 
    <td><font face=Verdana color=black size=1><?php echo $Alamat; ?></font></td> 
  </tr> 
  <tr> 
    <td><font face=Verdana color=black size=1>Telepon : <?php echo $Telepon; ?></font></td> 
  </tr>  
</thead>  
</table>  
<hr> 

<?php
echo "<font face=Verdana color=black size=1>dokumen</font><br><br>";
$result = mysqli_query($con, "SELECT * FROM dokumen");
echo "<div class='table-responsive'> "; 
echo "<table id=laporan width=100%>"; 
echo "<tr bgcolor=D3DCE3>
<th><font face=Verdana color=black size=1>No_Dokumen</font></th>
<th><font face=Verdana color=black size=1>Kode</font></th>
<th><font face=Verdana color=black size=1>Judul</font></th>
<th><font face=Verdana color=black size=1>Deskripsi</font></th>
<th><font face=Verdana color=black size=1>Tanggal_Pembuatan</font></th>
<th><font face=Verdana color=black size=1>Tanggal_Modifikasi</font></th>
<th><font face=Verdana color=black size=1>Kode_Pengguna</font></th>
</tr>";
while($row = mysqli_fetch_array($result))
  {
  echo "<td><font face=Verdana color=black size=1>" . $row['No_Dokumen'] . "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row['Kode'] . "<br>";
  $l = mysqli_query($con, "select Kategori from kategori_dokumen where Kode = '". $row['Kode'] ."'"); 
  while($rl = mysqli_fetch_array($l)){  
    echo $rl[0];    
  } 
  echo "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row['Judul'] . "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row['Deskripsi'] . "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row['Tanggal_Pembuatan'] . "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row['Tanggal_Modifikasi'] . "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row['Kode_Pengguna'] . "<br>";
  $l = mysqli_query($con, "select Nama from pengguna where Kode_Pengguna = '". $row['Kode_Pengguna'] ."'"); 
  while($rl = mysqli_fetch_array($l)){  
    echo $rl[0];    
  } 
  echo "</font></td>";
  echo "</tr>";
  }
echo "</table><br>";
echo "</div>";
mysqli_close($con);
echo "</td></tr>";
 ?>   
 </div> 
