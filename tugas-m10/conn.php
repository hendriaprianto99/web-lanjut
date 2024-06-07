<?php
// Deklarasi variabel
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "web_lanjut_toko123";

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if ($connection) {
    // echo "conn Berhasil!";
} else {
    echo "conn Gagal! : " . mysqli_connect_error();
}
?>
