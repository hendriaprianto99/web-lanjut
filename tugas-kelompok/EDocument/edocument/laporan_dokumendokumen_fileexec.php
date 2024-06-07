<style> 
#laporan td, #laporan th { 
  border: 1px solid #ddd; 
  padding: 4px; 
}
</style> 
<?php     
include("db.php");  
$TanggalAwal = mysqli_real_escape_string($con, $_POST['TanggalAwal']);  
$TanggalAkhir = mysqli_real_escape_string($con, $_POST['TanggalAkhir']);
$All = mysqli_real_escape_string($con, $_POST['All']);
  
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
 
echo "<font face=Verdana color=black size=1><b>Laporan dokumen/dokumen_file</b></font><br>";
if ($All == "Tidak"){  
 echo "<font face=Verdana color=black size=1>Tanggal : $TanggalAwal s.d. $TanggalAkhir</font><br>";
} 
 
echo "<table width=100%>";  
if ($All == "Tidak"){ 
$result = mysqli_query($con, "SELECT * FROM dokumen where Tanggal >= '$TanggalAwal' and Tanggal <= '$TanggalAkhir'");
} else { 
$result = mysqli_query($con, "SELECT * FROM dokumen");
} 
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td bgcolor=D3DCE3><font face=Verdana color=black size=1><b>No_Dokumen</b></font></td>";
echo "<td bgcolor=D3DCE3><font face=Verdana color=black size=1><b>Kode</b></font></td>";
echo "<td bgcolor=D3DCE3><font face=Verdana color=black size=1><b>Judul</b></font></td>";
echo "<td bgcolor=D3DCE3><font face=Verdana color=black size=1><b>Deskripsi</b></font></td>";
echo "<td bgcolor=D3DCE3><font face=Verdana color=black size=1><b>Tanggal_Pembuatan</b></font></td>";
echo "<td bgcolor=D3DCE3><font face=Verdana color=black size=1><b>Tanggal_Modifikasi</b></font></td>";
echo "<td bgcolor=D3DCE3><font face=Verdana color=black size=1><b>Kode_Pengguna</b></font></td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor=E5E5E5><font face=Verdana color=black size=1>" . $row['No_Dokumen'] . "</font></td>";
  echo "<td bgcolor=E5E5E5><font face=Verdana color=black size=1>" . $row['Kode'] . "<br>";
  $l = mysqli_query($con, "select Kategori from kategori_dokumen where Kode = '". $row['Kode'] ."'"); 
  while($rl = mysqli_fetch_array($l)){  
    echo $rl[0];    
  } 
  echo "</font></td>";
echo "<td bgcolor=E5E5E5><font face=Verdana color=black size=1>" . $row['Judul'] . "</font></td>";
echo "<td bgcolor=E5E5E5><font face=Verdana color=black size=1>" . $row['Deskripsi'] . "</font></td>";
echo "<td bgcolor=E5E5E5><font face=Verdana color=black size=1>" . $row['Tanggal_Pembuatan'] . "</font></td>";
echo "<td bgcolor=E5E5E5><font face=Verdana color=black size=1>" . $row['Tanggal_Modifikasi'] . "</font></td>";
  echo "<td bgcolor=E5E5E5><font face=Verdana color=black size=1>" . $row['Kode_Pengguna'] . "<br>";
  $l = mysqli_query($con, "select Nama from pengguna where Kode_Pengguna = '". $row['Kode_Pengguna'] ."'"); 
  while($rl = mysqli_fetch_array($l)){  
    echo $rl[0];    
  } 
  echo "</font></td>";
echo "</tr>"; 
echo "<tr>"; 
echo "<td colspan=7>"; 
echo "<table id=laporan align=right width=80%>";  
echo "<tr>";
echo "<td><font face=Verdana color=black size=1><b>id</b></font></td>";
echo "<td><font face=Verdana color=black size=1><b>No_Dokumen</b></font></td>";
echo "<td><font face=Verdana color=black size=1><b>File</b></font></td>";
echo "</tr>";
$result2 = mysqli_query($con, "SELECT * FROM dokumen_file where No_Dokumen = '". $row['No_Dokumen'] ."'");
while($row2 = mysqli_fetch_array($result2))
{
echo "<tr>";
echo "<td><font face=Verdana color=black size=1>" . $row2['id'] . "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row2['No_Dokumen'] . "<br>";
  $l = mysqli_query($con, "select Judul from dokumen where No_Dokumen = '". $row2['No_Dokumen'] ."'"); 
  while($rl = mysqli_fetch_array($l)){  
    echo $rl[0];    
  } 
  echo "</font></td>";
  echo "<td><font face=Verdana color=black size=1><a href='files/" . $row2['File'] . "' target=_blank>" . $row2['File'] . "</a></font></td>";
echo "</tr>"; 
} 
echo "</table>"; 
} 
echo "</td>"; 
echo "</tr>"; 
echo "</table>"; 
mysqli_close($con);
?>
