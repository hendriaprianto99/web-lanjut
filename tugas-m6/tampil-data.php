<?php

require "conn.php";

$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

echo "<table border='1' style='border-collapse: collapse; cellpadding=10 cellspacing=10'>
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Alamat</th>
    </tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
                <td>" . $row["NIM"] . "</td>
                <td>" . $row["Nama"] . "</td>
                <td>" . $row["Alamat"] . "</td>
            </tr>";
    }

?>