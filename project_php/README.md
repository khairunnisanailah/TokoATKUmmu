## Anggota Kelompok 3
1 **Khairunnisa Nailah Saadah (D1041241054)** 
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
*   **`config/`**
    └── `database.php`: Konfigurasi koneksi ke database
*   **`public/`**
    Berisi UI yang diakses langsung oleh user.
    └── `index.php`: Halaman utama yang Menampilkan data transaksi pembelian dan terdapat fitur logout.
    └── `tambah.php`: Menyediakan form input bagi user untuk menambah data transaksi baru.
    └── `edit.php`: Menyediakan form yang berisi data lama untuk diperbarui oleh user.
    └── `hapus.php`: Halaman konfirmasi sebelum data benar-benar dihapus dari sistem.
    └── `login.php`: Halaman login untuk user masuk menggunakan username dan password lalu menyimpan role untuk membatasi hak akses tertentu.
*   **`process/`**
    Berfungsi mengeksekusi intruksi operasional database, berisi script yang menghubungkan interaksi di UI.
    └── `insert.php`: Menyimpan data transaksi baru yang dikirim ke halaman tambah.
    └── `update.php`: Menyimpan perubahan data pada transaksi yang telah diedit.
    └── `delete.php`: Menghapus data transaksi yang dipilih dari sistem.

## Struktur Tabel Utama
Sistem ini berfokus pada tabel transaksi pembelian yang menyimpan seluruh record aktivitas pembelian barang ke supplier.
1. **TABEL ADMIN**
Menyimpan data admin yang bertugas mengelola transaksi pembelian.
    a. **ID Admin**: Kode unik untuk identitas setiap admin toko ummu (primary key).
    b. **Nama Admin**: Nama lengkap admin.
2. **TABEL SUPPLIER**
Menyimpan data supplier atau pemasok barang toko.
    a. **ID Supplier**: Kode unik untuk identitas setiap supplier (primary key).
    b. **Nama Toko**: Nama toko supplier.
    c. **Alamat**: Alamat lengkap toko supplier.
    d. **Kontak**: Kontak atau nomor telepon untuk menghubungi supplier.
3. Barang
Menyimpan seluruh data barang yang tersedia di toko maupun yang dibeli dari supplier.
    a. **ID Barang**: Kode unik untuk identitas setiap barang (primary key).
    b. **Nama Barang**: Nama barang-barang ATK.
    c. **Harga**: Harga barang ketika melakukan pembelian ke supplier.
    d. **Stok**: Jumlah stok barang yang tersedia di toko ummu.
    e. **ID Supplier**: Foreign key yang menghubungkan tabel barang tabel supplier.
4. **TABEL TRANSAKSI PEMBELIAN**
Menyimpan seluruh data transaksi pembelian barang ke supplier.
   a. **ID Transaksi**
      Kode unik (primary key) untuk setiap transaksi pembelian.
   b. **Tanggal Transaksi**
      Tanggal beserta bulan dan tahun dilakukannya transaksi pembelian.
   c. **ID Supplier**
      Sebagai penghubung (foreign key) ke data toko supplier.
   d. **Total Pembelian**
      Menyimpan total biaya dari seluruh barang yang dibeli tiap transaksi.
   e. **ID Admin**
      Kode identitas admin yang bertanggung jawab menginput transaksi.
5. **TABEL DETAIL TRANSAKSI**
Menyimpan seluruh detail barang yang terdapat pada setiak transaksi pembelian.
    a. **ID Barang**: Foreign key yang menghubungkan tabel detail transaksi dengan tabel barang.
    b. **ID Transaksi**: Foreign key yang menghubungkan tabel detail transaksi dengan tabel transaksi pembelian.
    c. **Quantity**: Jumlah barang yang dibeli pada setiap transaksi.

## Cara Menjalankan Project
1. **Import Database**: Masuk ke phpMyAdmin, lalu import file database yang telah dibuat di mini project II (database tokoatkummu).
2. **Konfigurasi Koneksi**: Sesuaikan pengaturan host, username, dan password pada file `config/database.php` agar terhubung ke database.
3. **Membuat Folder Proyek**: Pindahkan seluruh folder proyek ke dalam direktori server lokal seperti folder `htdocs' pada XAMPP.
4. **Akses Browser**: Buka browser dan arahkan alamat ke (link) untuk menjalankan aplikasi.
     link Hosting: https://tokoatkummu.lovestoblog.com/

## Analisis Sistem
analisis yang telah kami lakukan untuk sistem ini, yaitu:
1. **Analisis ACID**
2. **Load Testing**
3. **Benchmarking**
4. **EXPLAIN Query**
5. **Implementasi Index**
6. **Backup dan Restore**
7. **High Availibility**
8. **Simulasi Error**
9. **Pembatasan Hak Akses**
10. **Concurency dan Isolation Level**