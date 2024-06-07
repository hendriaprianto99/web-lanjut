<?php

$fileMhs =  fopen("mahasiswa.txt", "w") or die("File tidak bisa dibuat");

$mahasiswa1 = "joni\n";
$mahasiswa2 = "jono\n";
$mahasiswa3 = "Mulyo\n";
$mahasiswa4 = "joko\n";
$mahasiswa5 = "jonowi\n";
$mahasiswa = $mahasiswa1 . $mahasiswa2 . $mahasiswa3 . $mahasiswa4 . $mahasiswa5;

fwrite($fileMhs, $mahasiswa);
fclose($fileMhs);

?>