<?php

session_start();

$_SESSION["username"] = "Hendri Aprianto";
$_SESSION["password"] = "iniPassword";

echo "Username: " . $_SESSION["username"];
echo "</br>";
echo "Password: " . $_SESSION["password"];

?>