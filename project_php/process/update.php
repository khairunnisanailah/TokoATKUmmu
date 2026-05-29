<?php
require_once '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (!is_numeric($_POST['total']) || $_POST['total'] <= 0) {
        die("Gagal Update: Total pembelian harus berupa angka dan tidak boleh minus atau nol!");
    }

    try {
        $query_induk = "UPDATE transaksi_pembelian 
                        SET Tanggal_transaksi = :tanggal, 
                            Id_supplier = :supplier, 
                            Total_pembelian = :total, 
                            Id_admin = :admin 
                        WHERE Id_transaksi = :id";
        
        $stmt1 = $conn->prepare($query_induk);
        $stmt1->execute([
            ':tanggal'  => $_POST['tanggal'],
            ':supplier' => $_POST['supplier'],
            ':total'    => $_POST['total'],
            ':admin'    => $_POST['admin'],
            ':id'       => $_POST['id']
        ]);

        $query_detail = "UPDATE detail_transaksi 
                         SET Id_barang = :id_barang 
                         WHERE Id_transaksi = :id";
        
        $stmt2 = $conn->prepare($query_detail);
        $stmt2->execute([
            ':id_barang' => $_POST['id_barang'],
            ':id'        => $_POST['id']
        ]);

        header("Location: ../public/index.php?status=updated");
        exit();

    } catch (PDOException $e) {
        die("Gagal memperbarui data transaksi: " . $e->getMessage());
    }
} else {
    header("Location: ../public/index.php");
    exit();
}