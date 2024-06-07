<?php

// Membuka file dalam mode baca
$file = fopen("welcome.txt", "r") or exit("Unable to open file!");

echo $file;

?>
