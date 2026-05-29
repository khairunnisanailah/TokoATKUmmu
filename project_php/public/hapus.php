<?php
require_once '../config/database.php';
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan");
}
$id = $_GET['id'] ?? '';
$stmt = $conn->prepare("SELECT * FROM transaksi_pembelian WHERE Id_transaksi = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
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
    color: #343f21;
    margin: 20px;
    overflow-x: hidden;
    position: relative;
}

body::before {
    content: "";
    position: fixed;
    top: -70px;
    left: -70px;
    width: 230px;
    height: 230px;
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
    width: 260px;
    height: 260px;
    background: #b8e3ec;
    border-radius: 50%;
    opacity: 0.35;
    z-index: -1;
}

.decor1,
.decor2,
.decor3,
.decor4 {
    position: fixed;
    z-index: -1;
    opacity: 0.4;
    animation: floaty 4s ease-in-out infinite;
}

.decor1 {
    top: 100px;
    right: 220px;
    font-size: 28px;
}

.decor2 {
    bottom: 140px;
    left: 140px;
    font-size: 26px;
}

.decor3 {
    top: 320px;
    left: 90px;
    font-size: 22px;
}

.decor4 {
    bottom: 250px;
    right: 280px;
    font-size: 24px;
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

h2 {
    text-align: center;
    margin-bottom: 30px;
    color: #343f21;
    font-size: 30px;
    line-height: 1.5;
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

.container {
    width: 360px;
    margin: auto;
    background-color: rgba(255,255,255,0.92);
    backdrop-filter: blur(5px);
    padding: 30px;
    border-radius: 22px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    animation: fadeIn 0.5s ease;
}

label {
    font-size: 14px;
    font-weight: 500;
}

input {
    font-family: 'Poppins';
    width: 100%;
    padding: 10px;
    margin-top: 6px;
    border-radius: 10px;
    border: 1.5px solid #ffd0d6;
    background-color: #fffafb;
    color: #343f21;
    box-sizing: border-box;
}

.aksi {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 15px;
}

.btn-kembali,
.btn-hapus {
    border: none;
    padding: 10px 18px;
    border-radius: 10px;
    cursor: pointer;
    font-family: 'Poppins';
    font-weight: 500;
    transition: 0.25s;
}

.btn-kembali {
    background-color: #ffd0d6;
    color: #343f21;
    margin-right: 85px;
}

.btn-kembali:hover {
    background-color: #ffb7c2;
    transform: translateY(-2px);
}

.btn-hapus {
    background-color: #940c1b;
    color: white;
    margin-left: 85px;
}

.btn-hapus:hover {
    background-color: #c82333;
    transform: translateY(-2px);
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

</style>
</head>

<body>
<div class="decor1">✦</div>
<div class="decor2">♡</div>
<div class="decor3">☁</div>
<div class="decor4">❀</div>
<h2>Toko ATK Ummu <br> Hapus Data Transaksi</h2>

<div class="container">
    <form action="../process/delete.php" method="POST">

        <label>ID Transaksi</label><br>
        <input type="text" value="<?= $data['Id_transaksi']; ?>" readonly><br><br>

        <label>Tanggal</label><br>
        <input type="text" value="<?= $data['Tanggal_transaksi']; ?>" readonly><br><br>

        <label>Supplier</label><br>
        <input type="text" value="<?= $data['Id_supplier']; ?>" readonly><br><br>

        <label>Total</label><br>
        <input type="text" value="<?= $data['Total_pembelian']; ?>" readonly><br><br>

        <input type="hidden" name="id" value="<?= $data['Id_transaksi']; ?>">

        <div class="aksi">
            <button type="button" onclick="window.location.href='index.php'" class="btn-kembali">
                Kembali
            </button>

            <button type="submit" class="btn-hapus"
                onclick="return confirm('Yakin mau hapus data ini?')">
                Hapus
            </button>
        </div>

    </form>
</div>

</body>
</html>