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
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='dokumen_file' and user = '". $_SESSION['Email'] ."' and editData='1'";
$r = mysqli_query($con, $q);
if ( $obj = @mysqli_fetch_object($r) )
 {
?>
<?php
?>
<link href="standar.css" rel="stylesheet" type="text/css">

<!-- calendar -->
<script src="php_calendar/scripts.js" type="text/javascript"></script>
<!-- TinyMCE -->
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "youtube,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,zoom,flash,searchreplace,print,paste,directionality,fullscreen,noneditable,contextmenu",
		theme_advanced_buttons1_add_before : "save,newdocument,separator",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,zoom,separator,forecolor,backcolor,liststyle",
		theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
		theme_advanced_buttons3_add_before : "tablecontrols,separator,youtube,separator",
		theme_advanced_buttons3_add : "emotions,iespell,flash,advhr,separator,print,separator,ltr,rtl,separator,fullscreen",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		plugin_insertdate_dateFormat : "%Y-%m-%d",
		plugin_insertdate_timeFormat : "%H:%M:%S",
		extended_valid_elements : "hr[class|width|size|noshade]",
		file_browser_callback : "fileBrowserCallBack",
		paste_use_dialog : false,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
		media_strict : false,
		apply_source_formatting : true
	});

	function fileBrowserCallBack(field_name, url, type, win) {
		var connector = "../../filemanager/browser.html?Connector=connectors/php/connector.php";
		var enableAutoTypeSelection = true;

		var cType;
		tinymcpuk_field = field_name;
		tinymcpuk = win;

		switch (type) {
			case "image":
				cType = "Image";
				break;
			case "flash":
				cType = "Flash";
				break;
			case "file":
				cType = "File";
				break;
		}

		if (enableAutoTypeSelection && cType) {
			connector += "&Type=" + cType;
		}

		window.open(connector, "tinymcpuk", "modal,width=600,height=400");
	}
</script>
<!-- /TinyMCE -->
<?php
echo "<td bgcolor=F5F5F5 valign=top>";
echo "<table class='table table-striped'>";
echo "<tr><td colspan=2><font face=Verdana color=black size=1>dokumen_file</font></td></tr>";
echo "<form action=editdokumen_fileexec.php method=post>";
$result = mysqli_query($con, "SELECT * FROM dokumen_file where id = ". mysqli_real_escape_string($con, $_GET['id']) . "");
while($row = mysqli_fetch_array($result))
{
echo "<tr><td colspan=2><input type=hidden name=pk value='" . $row['id'] . "'></td></tr>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>&nbsp;&nbsp;id&nbsp;&nbsp;</font></td>";
echo "<td bgcolor=CCEEEE><font face=Verdana color=black size=1>&nbsp;&nbsp;" . $row['id'] . "&nbsp;&nbsp;</font></td>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>&nbsp;&nbsp;id&nbsp;&nbsp;</font></td>";
echo "<td bgcolor=CCEEEE><font face=Verdana color=black size=1>&nbsp;&nbsp;auto_increment&nbsp;&nbsp;</font></td>";
echo "<tr><td colspan=2><input type=hidden name=id value='" . $row['id'] . "'></td></tr>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>&nbsp;&nbsp;No_Dokumen&nbsp;&nbsp;</font></td>";
echo "<td bgcolor=CCEEEE>";
echo "<select class='form-control' name='No_Dokumen'>";
$result = mysqli_query($con, "select * from dokumen"); 
while($r = mysqli_fetch_array($result)){
if ($r['No_Dokumen'] == $row['No_Dokumen']) {
echo "<option value='". $r[No_Dokumen] ."' selected>". $r[No_Dokumen] ." | ". $r[Judul] ."</option>";
}else{
echo "<option value='". $r[No_Dokumen] ."'>". $r[No_Dokumen] ." | ". $r[Judul] ."</option>";
}
}
echo "</select>";
echo "</td>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>&nbsp;&nbsp;File&nbsp;&nbsp;</font></td>";
if(isset($row['id'])){ 
echo "<td bgcolor=CCEEEE>"; 
if(!empty($row['File'])){ 
echo "<a href='files/". $row['File'] ."' target=_blank>'". $row['File'] ."'</a><br>";
echo "<input type=text  class='form-control' name=File value=". $row['File'] ." hidden>"; 
} 
echo "<a href=uploadfiledokumen_file.php?id=". $row['id'] .">upload</a></td>"; 
}
echo "<tr><td colspan=2 align=center><button type='submit' class='btn btn-primary'><font face=Verdana size=1><i class='fa fa-edit'></i>&nbsp;Edit</font></button></td></tr>";
echo "</form>";
echo "</table></td></tr>";
}
 ?>  
 </div> 
 <?php 
include("footer.php");
?>
<?php
} else {
 //header("Location:content.php");
}
?>
