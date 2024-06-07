<?php

$kepada = "test@gmail.com";
$subjek = "Tugas Kuliah";
$pesan = "Teks ini dibuat untuk memenuhi tugas kuliah";
$dari = "hendriaprianto99@gmail.com";
$header = "Dari : $dari";

mail($kepada, $subjek, $pesan, $header);

echo "E-Mail telah terkirim!";

?>