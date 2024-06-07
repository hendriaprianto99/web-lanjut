<?php

include 'db.php';

if(isset($_GET['id'])) {
    $nim = mysqli_real_escape_string($conn, $_GET['id']);
    
    $query = "DELETE FROM mahasiswa WHERE NIM = '$nim'";
    
    if(mysqli_query($conn, $query)) {
        header("Location: listMahasiswa.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Parameter ID tidak ditemukan";
}

?>
