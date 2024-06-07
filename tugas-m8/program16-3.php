<?php

// Membuka file dalam mode baca
$file = fopen("welcome.txt", "r");

//some code to be executed
fclose($file);

echo $file;

?>
