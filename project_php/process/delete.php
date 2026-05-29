<?php
require_once '../config/database.php';

if (!isset($_POST['id'])) {
    die("ID tidak ditemukan");
}

try {
    $stmt = $conn->prepare(
        "DELETE FROM transaksi_pembelian WHERE Id_transaksi = :id"
    );

    $stmt->execute([
        ':id' => $_POST['id']
    ]);

    header("Location: ../public/index.php?status=deleted");
} catch (PDOException $e) {
    echo "Gagal hapus data: " . $e->getMessage();
}