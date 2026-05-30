## Anggota Kelompok 3

1. **Khairunnisa Nailah Saadah (D1041241054)** 

2. **Naufrisya Rizqy Syabilla (D1041241081)**

3. **Ummu Kultsum (D1041241089)**

## Sistem Pencatatan Transaksi pada Toko ATK Ummu
Project ini merupakan sistem sederhana yang digunakan untuk mengelola data transaksi pembelian dari supplier, menggunakan integrasi PHP dan MySQLi. Sistem ini memungkinkan user melakukan operasi CRUD pada data transaksi.

## Fitur
*   **Read**: Menampilkan seluruh riwayat transaksi pembelian ke supplier yang tersimpan di sistem.
*   **Create**: Menginput transaksi pembelian baru, termasuk mendata supplier dan admin toko.
*   **Update**: Memperbarui informasi pada record transaksi jika terdapat kesalahan data.
*   **Delete**: Menghapus record transaksi tertentu dari sistem.

## Struktur Folder
```text
project/
├── config/
│   └── database.php
│
├── public/
│   ├── index.php
│   ├── tambah.php
│   ├── edit.php
│   ├── hapus.php
│   └── login.php
│
└── process/
    ├── insert.php
    ├── update.php
    └── delete.php
```
### Keterangan
#### config/
- **database.php** → Konfigurasi koneksi ke database.
#### public/
- **index.php** → Halaman utama yang menampilkan data transaksi pembelian dan menyediakan fitur logout.
- **tambah.php** → Form untuk menambahkan data transaksi baru.
- **edit.php** → Form untuk memperbarui data transaksi yang sudah ada.
- **hapus.php** → Halaman konfirmasi penghapusan data transaksi.
- **login.php** → Halaman login untuk autentikasi pengguna dan penyimpanan role.
#### process/
- **insert.php** → Menyimpan data transaksi baru ke database.
- **update.php** → Menyimpan perubahan data transaksi yang telah diedit.
- **delete.php** → Menghapus data transaksi dari database.

## Struktur Tabel Utama

Sistem ini berfokus pada tabel transaksi pembelian yang menyimpan seluruh record aktivitas pembelian barang ke supplier.

### 1. Tabel Admin

Menyimpan data admin yang bertugas mengelola transaksi pembelian.

**a. ID Admin**  
Kode unik untuk identitas setiap admin Toko Ummu (*Primary Key*).

**b. Nama Admin**  
Nama lengkap admin.

### 2. Tabel Supplier

Menyimpan data supplier atau pemasok barang toko.

**a. ID Supplier**  
Kode unik untuk identitas setiap supplier (*Primary Key*).

**b. Nama Toko**  
Nama toko supplier.

**c. Alamat**  
Alamat lengkap toko supplier.

**d. Kontak**  
Kontak atau nomor telepon untuk menghubungi supplier.

### 3. Tabel Barang

Menyimpan seluruh data barang yang tersedia di toko maupun yang dibeli dari supplier.

**a. ID Barang**  
Kode unik untuk identitas setiap barang (*Primary Key*).

**b. Nama Barang**  
Nama barang ATK.

**c. Harga**  
Harga barang ketika melakukan pembelian ke supplier.

**d. Stok**  
Jumlah stok barang yang tersedia di Toko Ummu.

**e. ID Supplier**  
*Foreign Key* yang menghubungkan tabel barang dengan tabel supplier.

### 4. Tabel Transaksi Pembelian

Menyimpan seluruh data transaksi pembelian barang ke supplier.

**a. ID Transaksi**  
Kode unik (*Primary Key*) untuk setiap transaksi pembelian.

**b. Tanggal Transaksi**  
Tanggal, bulan, dan tahun dilakukannya transaksi pembelian.

**c. ID Supplier**  
*Foreign Key* yang menghubungkan tabel transaksi pembelian dengan tabel supplier.

**d. Total Pembelian**  
Menyimpan total biaya seluruh barang yang dibeli dalam satu transaksi.

**e. ID Admin**  
Kode identitas admin yang bertanggung jawab menginput transaksi.

### 5. Tabel Detail Transaksi

Menyimpan seluruh detail barang yang terdapat pada setiap transaksi pembelian.

**a. ID Barang**  
*Foreign Key* yang menghubungkan tabel detail transaksi dengan tabel barang.

**b. ID Transaksi**  
*Foreign Key* yang menghubungkan tabel detail transaksi dengan tabel transaksi pembelian.

**c. Quantity**  
Jumlah barang yang dibeli pada setiap transaksi.


## Cara Menjalankan Project
1. **Import Database**: Masuk ke phpMyAdmin, lalu import file database yang telah dibuat di mini project II (database tokoatkummu).
2. **Konfigurasi Koneksi**: Sesuaikan pengaturan host, username, dan password pada file `config/database.php` agar terhubung ke database.
3. **Membuat Folder Proyek**: Pindahkan seluruh folder proyek ke dalam direktori server lokal seperti folder `htdocs' pada XAMPP.
4. **Akses Browser**: Buka browser dan arahkan alamat ke (link) untuk menjalankan aplikasi.
     link Hosting: https://tokoatkummu.lovestoblog.com/

## Analisis Sistem
analisis yang telah kami lakukan untuk sistem ini, yaitu:
1. **Concurency dan Isolation Level**
2. **Analisis ACID**
2. **Load Testing dan Benchmarking**
4. **EXPLAIN Query**
5. **Implementasi Index**
6. **Pembatasan Hak Akses**
7. **Backup dan Restore**
8. **High Availibility**
9. **Simulasi Error**
