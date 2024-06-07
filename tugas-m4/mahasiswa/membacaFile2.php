<?php

require '../matematika/matematika.php';

$fileMhs = fopen("mahasiswa.txt", "r") or die("Tidak bisa membuka file!");

echo fread($fileMhs, filesize("mahasiswa.txt"));

fclose($fileMhs);

?>