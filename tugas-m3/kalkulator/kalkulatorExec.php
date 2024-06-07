<?php

$x = $_POST["x"];
$y = $_POST["y"];

echo "<h3>Hasil</h3>";
echo $_POST["x"] . " + " . $_POST["y"] . " = " . ($x + $y) . "</br>";
echo $_POST["x"] . " - " . $_POST["y"] . " = " . ($x - $y) . "</br>";
echo $_POST["x"] . " / " . $_POST["y"] . " = " . ($x / $y) . "</br>";
echo $_POST["x"] . " * " . $_POST["y"] . " = " . ($x * $y) . "</br>";

?>