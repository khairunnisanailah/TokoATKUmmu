<?php
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Akses tidak valid");
}

if (
    empty($_POST['id']) ||
    empty($_POST['tanggal']) ||
    empty($_POST['id_barang']) || 
    empty($_POST['supplier']) ||
    empty($_POST['total']) ||
    empty($_POST['admin'])
) {
    die("Semua field wajib diisi");
}

if (!is_numeric($_POST['total'])) {
    die("Total harus berupa angka");
}

if ($_POST['total'] <= 0) {
    die("Total pembelian tidak valid");
}

try {
    $stmt1 = $conn->prepare(
        "INSERT INTO transaksi_pembelian 
        (Id_transaksi, Tanggal_transaksi, Id_supplier, Total_pembelian, Id_admin)
        VALUES (:id, :tanggal, :supplier, :total, :admin)"
    );
    $stmt1->execute([
        ':id' => $_POST['id'],
        ':tanggal' => $_POST['tanggal'],
        ':supplier' => $_POST['supplier'],
        ':total' => $_POST['total'],
        ':admin' => $_POST['admin']
    ]);

    $stmt2 = $conn->prepare(
        "INSERT INTO detail_transaksi (Id_transaksi, Id_barang) 
        VALUES (:id, :id_barang)"
    );

    $stmt2->execute([
        ':id' => $_POST['id'],
        ':id_barang' => $_POST['id_barang']
    ]);

    header("Location: ../public/index.php?status=sukses");
    exit;

} catch (PDOException $e) {
    echo "Gagal insert data: " . $e->getMessage();
}