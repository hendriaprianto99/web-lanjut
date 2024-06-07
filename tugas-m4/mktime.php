<?php

$besok = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
echo "Besok adalah tanggal " . date("d/m/Y", $besok);

?>