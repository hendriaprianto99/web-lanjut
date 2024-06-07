<?php

require '../matematika/matematika.php';

$fileMhs = fopen("mahasiswa.txt", "r") or die("Tidak bisa membuka file!");

while(!feof($fileMhs)) {
    echo fgets($fileMhs);
    barisBaru();
}

?>