<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require_once '../config/database.php';

$query = "SELECT 
            tp.Id_transaksi,
            tp.Tanggal_transaksi,
            tp.Total_pembelian,
            b.Nama_barang,
            s.Nama_toko AS Nama_supplier,
            a.Nama_admin
          FROM transaksi_pembelian tp
          LEFT JOIN detail_transaksi dtp 
                ON tp.Id_transaksi = dtp.Id_transaksi
          LEFT JOIN barang b 
                ON dtp.Id_barang = b.Id_barang
          LEFT JOIN supplier s 
                ON tp.Id_supplier = s.Id_supplier
          LEFT JOIN admin a 
                ON tp.Id_admin = a.Id_admin";

$stmt = $conn->query($query);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <title>Toko ATK Ummu</title>
<style>
body {
    font-family: 'Poppins';
    background: linear-gradient(to right, #fff8f9, #faf9ee);
    margin: 20px;
    color: #343f21;
    overflow-x: hidden;
    position: relative;
}

body::before {
    content: "";
    position: fixed;
    top: -80px;
    left: -80px;
    width: 250px;
    height: 250px;
    background: #ffd0d6;
    border-radius: 50%;
    opacity: 0.35;
    z-index: -1;
}

body::after {
    content: "";
    position: fixed;
    bottom: -90px;
    right: -90px;
    width: 280px;
    height: 280px;
    background: #b8e3ec;
    border-radius: 50%;
    opacity: 0.35;
    z-index: -1;
}

.decor1,
.decor2,
.decor3 {
    position: fixed;
    font-size: 28px;
    opacity: 0.4;
    z-index: -1;
}

.decor1 {
    top: 120px;
    right: 180px;
}

.decor2 {
    bottom: 140px;
    left: 120px;
}

.decor3 {
    top: 300px;
    left: 90px;
}

h2 {
    text-align: center;
    margin-bottom: 30px;
    color: #343f21;
    font-size: 30px;
    line-height: 1.5;
    position: relative;
}

h2::after {
    content: "";
    display: block;
    width: 120px;
    height: 6px;
    background: linear-gradient(to right, #ffd0d6, #207487);
    margin: 12px auto 0;
    border-radius: 20px;
}

table {
    width: 75%;
    margin: auto;
    border-collapse: collapse;
    background-color: rgba(255,255,255,0.9);
    backdrop-filter: blur(5px);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    animation: fadeIn 0.5s ease;
}

th {
    background: linear-gradient(to right, #ffd0d6, #ffc2cb);
    color: #343f21;
    padding: 15px;
    font-size: 15px;
    letter-spacing: 0.5px;
}

td {
    padding: 14px;
    text-align: center;
    border-bottom: 1px solid #f0f0f0;
    font-size: 14px;
}

tr:last-child td {
    border-bottom: none;
}

tr:hover {
    background-color: #fff5f6;
    transition: 0.25s;
    transform: scale(1.003);
}

td.aksi {
    white-space: nowrap;
}

.btn {
    padding: 7px 15px;
    border-radius: 10px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 500;
    display: inline-block;
    transition: 0.25s;
}

.btn-edit {
    background-color: #ffe38e;
    color: #4a3a00;
    margin-right: 20px;
    box-shadow: 0 3px 8px rgba(255, 211, 56, 0.3);
}

.btn-edit:hover {
    background-color: #ffcd38;
    transform: translateY(-2px);
}

.btn-hapus {
    background-color: #940c1b;
    color: white;
    margin-left: 20px;
    box-shadow: 0 3px 8px rgba(148, 12, 27, 0.25);
}

.btn-hapus:hover {
    background-color: #c82333;
    transform: translateY(-2px);
}

.btn-tambah {
    background-color: #207487;
    color: #ffffff;
    padding: 12px 18px;
    border-radius: 12px;
    text-decoration: none;
    display: inline-block;
    margin-top: 22px;
    margin-left: 12.5%;
    font-weight: 500;
    box-shadow: 0 5px 12px rgba(32,116,135,0.25);
    transition: 0.25s;
}

.btn-tambah:hover {
    background-color: #0f5261;
    transform: translateY(-2px) scale(1.03);
}
.decor4,
.decor5,
.decor6 {
    position: fixed;
    font-size: 22px;
    opacity: 0.35;
    z-index: -1;
    animation: floaty 4s ease-in-out infinite;
}

.decor4 {
    top: 180px;
    left: 250px;
}

.decor5 {
    top: 420px;
    right: 120px;
}

.decor6 {
    bottom: 220px;
    right: 300px;
}

@keyframes floaty {
    0% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
    100% {
        transform: translateY(0px);
    }
}
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media screen and (max-width: 768px) {
    table {
        width: 100%;
    }

    .btn-tambah {
        margin-left: 0;
    }

    h2 {
        font-size: 23px;
    }

    td, th {
        font-size: 12px;
        padding: 10px;
    }
}
</style>
</head>
<body>
<div class="decor1">✦</div>
<div class="decor2">✿</div>
<div class="decor3">♡</div>
<div class="decor4">☁</div>
<div class="decor5">✦</div>
<div class="decor6">❀</div>

<div style="text-align:right; margin-bottom:20px;">

    <a href="login.php?logout=true" 
       style="
       background:#940c1b;
       color:white;
       padding:10px 18px;
       text-decoration:none;
       border-radius:12px;
       font-family:Poppins;
       box-shadow:0 4px 10px rgba(148,12,27,0.2);
       ">
       Logout
    </a>

</div>

<h2>
    Toko ATK Ummu <br>
    Data Transaksi Pembelian Barang
</h2>

<table>
<tr>
    <th>ID Transaksi</th>
    <th>Nama Barang</th>
    <th>Tanggal</th>
    <th>Nama Toko Supplier</th> <th>Total</th>
    <th>Nama Admin</th> <?php if ($_SESSION['role'] == 'admin') : ?>
    <th>Aksi</th>
<?php endif; ?>
</tr>

<?php foreach ($data as $row): ?>
<tr>
    <td><?= $row['Id_transaksi']; ?></td>
    <td><?= $row['Nama_barang']; ?></td>
    <td><?= $row['Tanggal_transaksi']; ?></td>
    <td><?= $row['Nama_supplier']; ?></td>
<td><?= $row['Total_pembelian']; ?></td>
<td><?= $row['Nama_admin']; ?></td>

<?php if ($_SESSION['role'] == 'admin') : ?>
<td class="aksi">
    <a class="btn btn-edit" href="edit.php?id=<?= $row['Id_transaksi']; ?>">
        Edit
    </a>
    <a class="btn btn-hapus" href="hapus.php?id=<?= $row['Id_transaksi']; ?>">
        Hapus
    </a>
</td>
<?php endif; ?>
</tr>
<?php endforeach; ?>
</table>
    <?php if ($_SESSION['role'] == 'admin') : ?>
    <a class="btn btn-tambah" href="tambah.php">
        + Tambah Data
    </a>
<?php endif; ?>
</body>
</html>


