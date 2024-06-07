<?php

// fungsi dengan parameter
echo "<h2>Fungsi Tanpa Parameter</h2>";
function tampilNama() {
    echo "Hendri Aprianto" . "</br>";
}
tampilNama();

// fungsi dengan parameter
echo "</br> <h2>Fungsi Dengan Parameter</h2>";
function namaPanjang($namaDepan, $namaBelakang) {
    echo $namaDepan . " " . $namaBelakang . "</br>";
}
namaPanjang("Hendri", "Aprianto");

?>