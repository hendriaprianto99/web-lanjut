<style> 
* {   
    margin: 0; 
    padding: 0; 
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box; 
    box-sizing: border-box 
} 

.container {
    margin-top: 10px 
}
 
ul {
    list-style-type: none 
}
  
a { 
    color: #b63b4d; 
    text-decoration: none  
} 
 
.accordion { 
    width: 100%; 
    max-width: 300px; 
    margin: 0px auto 0px;  
    background: #F8F8F8;
    -webkit-border-radius: 4px; 
    -moz-border-radius: 4px;   
    border-radius: 5px 
}  
 
.accordion .link { 
    cursor: pointer; 
    display: block; 
    padding: 15px 15px 15px 42px; 
    color: #4D4D4D;
   font-size: 12px;
    font-weight: 500; 
    border-bottom: 1px solid #CCC; 
    position: relative; 
    -webkit-transition: all 0.4s ease; 
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease 
} 
 
.accordion li:last-child .link { 
    border-bottom: 0     
} 
 
.accordion li i {
    position: absolute; 
    top: 16px;
    left: 12px; 
    font-size: 12px;  
    color: #595959; 
    -webkit-transition: all 0.4s ease; 
    -o-transition: all 0.4s ease; 
    transition: all 0.4s ease  
} 
 
.accordion li i.fa-chevron-down {
    right: 12px;   
    left: auto; 
    font-size: 12px  
} 
 
.accordion li.open .link { 
    color: #535054 
} 
 
.accordion li.open i { 
    color: #535054  
}  
 
.accordion li.open i.fa-chevron-down {
    -webkit-transform: rotate(180deg); 
    -ms-transform: rotate(180deg);
    -o-transform: rotate(180deg); 
    transform: rotate(180deg)  
}   
 
.submenu { 
    display: none;  
    background: #FFFFFF; 
    font-size: 12px  
} 
 
.submenu li {   
    border-bottom: 1px solid #4b4a5e   
} 
 
.submenu a { 
    display: block;  
    text-decoration: none; 
    color: gray; 
    padding: 12px; 
    padding-left: 10px; 
    -webkit-transition: all 0.25s ease; 
    -o-transition: all 0.25s ease; 
    transition: all 0.25s ease  
}
 
.submenu a:hover {
    background: #C7C8CC;  
    color: #FFF  
}  
</style>  
  
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> 
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script> 
<script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script> 

 <div class="navbar-default sidebar" role="navigation"> 
    <div class="sidebar-nav navbar-collapse">   
    <ul id="accordion" class="accordion"> 
        <li>   
            <a href="content.php"><div class="link"><i class="fa fa-dashboard"></i>Dashboard</div></a>  
        </li> 
        <li>  
            <div class="link"><i class="fa fa-tasks"></i>Master<i class="fa fa-chevron-down"></i></div>  
            <ul class="submenu">  
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='dokumen' and user = '". $_SESSION['Email'] ."' and listData='1'"; 
$r = mysqli_query($con, $q); 
if ( $obj = @mysqli_fetch_object($r) ){ 
  echo "<li><a href=listdokumen.php>dokumen</a></li>";
} 
?>
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='dokumen_file' and user = '". $_SESSION['Email'] ."' and listData='1'"; 
$r = mysqli_query($con, $q); 
if ( $obj = @mysqli_fetch_object($r) ){ 
  echo "<li><a href=listdokumen_file.php>dokumen_file</a></li>";
} 
?>
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='jenis_pengguna' and user = '". $_SESSION['Email'] ."' and listData='1'"; 
$r = mysqli_query($con, $q); 
if ( $obj = @mysqli_fetch_object($r) ){ 
  echo "<li><a href=listjenis_pengguna.php>jenis_pengguna</a></li>";
} 
?>
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='kategori_dokumen' and user = '". $_SESSION['Email'] ."' and listData='1'"; 
$r = mysqli_query($con, $q); 
if ( $obj = @mysqli_fetch_object($r) ){ 
  echo "<li><a href=listkategori_dokumen.php>kategori_dokumen</a></li>";
} 
?>
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='pengguna' and user = '". $_SESSION['Email'] ."' and listData='1'"; 
$r = mysqli_query($con, $q); 
if ( $obj = @mysqli_fetch_object($r) ){ 
  echo "<li><a href=listpengguna.php>pengguna</a></li>";
} 
?>
            </ul>  
        </li>  
        <li>   
            <div class="link"><i class="fa fa-edit"></i>Transaksi<i class="fa fa-chevron-down"></i></div>
            <ul class="submenu">   
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='pengguna/dokumen' and user = '". $_SESSION['Email'] ."' and listData='1'"; 
$r = mysqli_query($con, $q); 
if ( $obj = @mysqli_fetch_object($r) ){ 
  echo "<li><a href=listmasterpenggunadokumen.php>pengguna/dokumen</a></li>";
} 
?>
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='dokumen/dokumen_file' and user = '". $_SESSION['Email'] ."' and listData='1'"; 
$r = mysqli_query($con, $q); 
if ( $obj = @mysqli_fetch_object($r) ){ 
  echo "<li><a href=listmasterdokumendokumen_file.php>dokumen/dokumen_file</a></li>";
} 
?>
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='jenis_pengguna/pengguna' and user = '". $_SESSION['Email'] ."' and listData='1'"; 
$r = mysqli_query($con, $q); 
if ( $obj = @mysqli_fetch_object($r) ){ 
  echo "<li><a href=listmasterjenis_penggunapengguna.php>jenis_pengguna/pengguna</a></li>";
} 
?>
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='kategori_dokumen/dokumen' and user = '". $_SESSION['Email'] ."' and listData='1'"; 
$r = mysqli_query($con, $q); 
if ( $obj = @mysqli_fetch_object($r) ){ 
  echo "<li><a href=listmasterkategori_dokumendokumen.php>kategori_dokumen/dokumen</a></li>";
} 
?>
            </ul>  
        </li>  
        <li> 
            <div class="link"><i class="fa fa-file"></i>Laporan<i class="fa fa-chevron-down"></i></div> 
            <ul class="submenu">  
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='pengguna/dokumen' and user = '". $_SESSION['Email'] ."' and listData='1'"; 
$r = mysqli_query($con, $q); 
if ( $obj = @mysqli_fetch_object($r) ){ 
  echo "<li><a href=laporan_penggunadokumen.php>pengguna/dokumen</a></li>";
} 
?>
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='dokumen/dokumen_file' and user = '". $_SESSION['Email'] ."' and listData='1'"; 
$r = mysqli_query($con, $q); 
if ( $obj = @mysqli_fetch_object($r) ){ 
  echo "<li><a href=laporan_dokumendokumen_file.php>dokumen/dokumen_file</a></li>";
} 
?>
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='jenis_pengguna/pengguna' and user = '". $_SESSION['Email'] ."' and listData='1'"; 
$r = mysqli_query($con, $q); 
if ( $obj = @mysqli_fetch_object($r) ){ 
  echo "<li><a href=laporan_jenis_penggunapengguna.php>jenis_pengguna/pengguna</a></li>";
} 
?>
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='kategori_dokumen/dokumen' and user = '". $_SESSION['Email'] ."' and listData='1'"; 
$r = mysqli_query($con, $q); 
if ( $obj = @mysqli_fetch_object($r) ){ 
  echo "<li><a href=laporan_kategori_dokumendokumen.php>kategori_dokumen/dokumen</a></li>";
} 
?>
            </ul> 
        </li>    
        <li>   
            <div class="link"><i class="fa fa-gear"></i>Setting<i class="fa fa-chevron-down"></i></div> 
            <ul class="submenu"> 
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='user' and user = '". $_SESSION['Email'] ."' and listData='1'"; 
$r = mysqli_query($con, $q); 
if ( $obj = @mysqli_fetch_object($r) ){ 
  echo "<li><a href=listuser.php>user</a></li>";
} 
?>
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='Manage_User_Access' and user = '". $_SESSION['Email'] ."' and listData='1'"; 
$r = mysqli_query($con, $q); 
if ( $obj = @mysqli_fetch_object($r) ){ 
  echo "<li><a href=listmastertw_tabeltw_hak_akses.php></i>Manage User Access</a></li>";
} 
?>
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='logtw' and user = '". $_SESSION['Email'] ."' and listData='1'"; 
$r = mysqli_query($con, $q); 
if ( $obj = @mysqli_fetch_object($r) ){ 
  echo "<li><a href=listlogtw.php>logtw</a></li>";
} 
?>
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='setting' and user = '". $_SESSION['Email'] ."' and listData='1'"; 
$r = mysqli_query($con, $q); 
if ( $obj = @mysqli_fetch_object($r) ){ 
  echo "<li><a href=listsetting.php>setting</a></li>";
} 
?>
            </ul>
        </li>  
        <li>  
            <a href=logout.php  onclick="return confirm('Are you sure?')"><div class="link"><i class="fa fa-sign-out"></i>Logout</div></a>
        </li>
    </ul>  
    </div> 
</div>   
</div> 

<script type='text/javascript'>$(function() {  
var Accordion = function(el, multiple) {  
this.el = el || {};  
this.multiple = multiple || false; 

var links = this.el.find('.link');

links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown) 
}  

Accordion.prototype.dropdown = function(e) {   
var $el = e.data.el;   
$this = $(this),  
$next = $this.next(); 

$next.slideToggle(); 
$this.parent().toggleClass('open'); 

if (!e.data.multiple) {   
$el.find('.submenu').not($next).slideUp().parent().removeClass('open'); 
}; 
} 

var accordion = new Accordion($('#accordion'), false);  
}); 
</script>  
