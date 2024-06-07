<?php
require 'db.php';

$table_name = $_GET["table"];
$primaryKeyValue = $_GET["id"];

// Validasi nama tabel untuk mencegah SQL injection
if (!preg_match('/^[a-zA-Z0-9_]+$/', $table_name)) {
    die('Invalid table name');
}

try {
    // Mengambil nama kolom dan primary key
    $stmt = $conn->query("SHOW COLUMNS FROM $table_name");
    $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Mendapatkan nama primary key
    $primaryKey = null;
    foreach ($columns as $column) {
        if ($column['Key'] === 'PRI') {
            $primaryKey = $column['Field'];
            break; // Primary key ditemukan, tidak perlu melanjutkan
        }
    }

    // Jika primary key tidak ditemukan, hentikan skrip dengan pesan kesalahan
    if ($primaryKey === null) {
        die('Primary key not found');
    }

    // Menyiapkan pernyataan delete
    $sql = "DELETE FROM $table_name WHERE $primaryKey = :primaryKeyValue";
    $stmt = $conn->prepare($sql);

    // Mengikat nilai primary key ke pernyataan
    $stmt->bindValue(":primaryKeyValue", $primaryKeyValue, PDO::PARAM_INT);

    // Menjalankan pernyataan
    if ($stmt->execute()) {
        header("Location: list.php?table=$table_name&message=Data deleted successfully");
        exit();
    } else {
        echo 'Error deleting data';
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
