<?php

setcookie("username", "Hendri Aprianto", time()+3600);

if(isset($_COOKIE["username"])) {
    echo $_COOKIE["username"];
} else {
    echo "Tidak ada cookie!";
}

?>