<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<html>
<head>
<title>store</title> 
<link rel="stylesheet" type="text/css" href="tag.css"> 
</head>
<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgcolor =FFFFFF>
<?php
include("db.php");
include("header.php");
include("menu.php");
echo "<td bgcolor=F5F5F5 valign=top>";
?>
<div id="page-wrapper"> 
<br> 
<br> 
<form action="uploadfiledokumenexec.php" method="post" enctype="multipart/form-data"> 
<input type=text  class='form-control' name=id value=<?php echo $_GET['id']; ?> hidden><br> 
<input type="file" id="upload_file" name="file" multiple/> 
<input type="submit" name='send_file' value="Upload File"/> 
</form>
</div>
<?php echo "</td>";
include("footer.php");
?>
</body>
</html>
