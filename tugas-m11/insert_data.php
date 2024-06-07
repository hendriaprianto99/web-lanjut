<?php
require 'db.php';

// Mengambil nama tabel dari parameter GET dan validasi untuk mencegah SQL injection
$table_name = $_GET["table"];
if (!preg_match('/^[a-zA-Z0-9_]+$/', $table_name)) {
    die('Invalid table name');
}

try {
    // Mengambil nama kolom dari tabel
    $stmt = $conn->query("SHOW COLUMNS FROM $table_name");
    $columns = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Memfilter kolom dan membuat placeholder untuk pernyataan SQL
    $columnNames = array_filter($columns, function($column) {
        return $column !== 'id'; // Menganggap 'id' adalah kolom auto-increment
    });
    $columnPlaceholders = array_map(function($column) {
        return ":$column";
    }, $columnNames);

    // Menyiapkan pernyataan insert
    $sql = "INSERT INTO $table_name (" . implode(', ', $columnNames) . ") VALUES (" . implode(', ', $columnPlaceholders) . ")";
    $stmt = $conn->prepare($sql);

    // Mengikat nilai form ke pernyataan
    foreach ($columnNames as $column) {
        if (isset($_POST[$column])) {
            $stmt->bindValue(":$column", $_POST[$column]);
        } else {
            // Jika kolom tidak ada di POST dan kolom tersebut tidak bisa null, berikan pesan error yang jelas
            die("Error: Missing value for required column '$column'");
        }
    }

    // Menjalankan pernyataan
    if ($stmt->execute()) {
        header("Location: list.php?table=$table_name&message=Data inserted successfully");
        exit();
    } else {
        echo 'Error inserting data';
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
