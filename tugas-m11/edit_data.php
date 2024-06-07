<?php
require 'db.php';

$table_name = $_GET["table"];

// Validasi nama tabel untuk mencegah SQL injection
if (!preg_match('/^[a-zA-Z0-9_]+$/', $table_name)) {
    die('Invalid table name');
}

try {
    // Mengambil nama kolom dan primary key
    $stmt = $conn->query("SHOW COLUMNS FROM $table_name");
    $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Mendapatkan nama kolom dan mendeteksi primary key
    $columnNames = [];
    $primaryKey = null;
    foreach ($columns as $column) {
        $columnNames[] = $column['Field'];
        if ($column['Key'] === 'PRI') {
            $primaryKey = $column['Field'];
        }
    }

    // Periksa apakah primary key ditemukan
    if (!$primaryKey) {
        die('Primary key not found');
    }

    // Siapkan pernyataan update
    $columnPlaceholders = array_map(function($column) {
        return "$column = :$column";
    }, $columnNames);

    $sql = "UPDATE $table_name SET " . implode(', ', $columnPlaceholders) . " WHERE $primaryKey = :primaryKey";
    $stmt = $conn->prepare($sql);

    // Mengikat nilai form ke pernyataan
    foreach ($columnNames as $column) {
        if (isset($_POST[$column])) {
            $stmt->bindValue(":$column", $_POST[$column]);
        } else {
            // Jika kolom tidak ada di POST dan kolom tersebut tidak boleh null, beri nilai default atau pesan error
            $stmt->bindValue(":$column", null, PDO::PARAM_NULL); // Atau Anda dapat memilih nilai default yang sesuai
        }
    }

    // Mengikat nilai primary key
    if (isset($_POST[$primaryKey])) {
        $stmt->bindValue(":primaryKey", $_POST[$primaryKey]);
    } else {
        die('Primary key value is missing');
    }

    // Menjalankan pernyataan
    if ($stmt->execute()) {
        header("Location: list.php?table=$table_name&message=Data updated successfully");
        exit();
    } else {
        echo 'Error updating data';
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
