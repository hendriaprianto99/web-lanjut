<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "akademik";

$conn = mysqli_connect($server, $username, $password, $database);

if(mysqli_connect_error()) {
    echo "Koneksi gagal:" . mysqli_connect_error();
} else {
    echo "Koneksi Berhasil" . "</br></br>";
}

?>