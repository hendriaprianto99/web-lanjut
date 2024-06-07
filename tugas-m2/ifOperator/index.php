<?php
    $x = 10;

    // baris 1
    if($x == 10) {
        echo "x = 10";
    }
    echo "</br>";

    // baris2
    if($x == 9) {
        echo "x = 10";
    } else {
        echo "x != 10";
    }
    echo "</br>";

    // baris3
    if($x == 100) {
        echo "x = 10";
    } elseif($x == 109) {
        echo "x = 9";
    } else {
        echo "x != 9 dan 10";
    }
    echo "</br>";
?>