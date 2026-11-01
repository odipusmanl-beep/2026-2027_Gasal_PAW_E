-- Database Schema & Data DML untuk tp_modul5

CREATE DATABASE IF NOT EXISTS tp_modul5;
USE tp_modul5;

-- 1. Tabel pelanggan
CREATE TABLE IF NOT EXISTS pelanggan (
    id VARCHAR(20) NOT NULL PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    jenis_kelamin ENUM('L', 'P') NOT NULL,
    telp VARCHAR(12),
    alamat TEXT
);

-- 2. Tabel supplier
CREATE TABLE IF NOT EXISTS supplier (
    id INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    telp VARCHAR(12),
    alamat TEXT
);

-- 3. Tabel barang
CREATE TABLE IF NOT EXISTS barang (
    id INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    kode_barang VARCHAR (10) NOT NULL,
    nama_barang VARCHAR (100) NOT NULL,
    harga INT (11) NOT NULL,
    stok INT (11) NOT NULL,
    supplier_id INT (11),
    FOREIGN KEY (supplier_id) REFERENCES supplier (id) ON DELETE SET NULL ON UPDATE CASCADE
);

-- 4. Tabel transaksi
CREATE TABLE IF NOT EXISTS transaksi (
    id INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    waktu_transaksi DATE NOT NULL,
    keterangan TEXT,
    total INT (11) NOT NULL,
    pelanggan_id VARCHAR(20),
    FOREIGN KEY (pelanggan_id) REFERENCES pelanggan (id) ON DELETE SET NULL ON UPDATE CASCADE
);

-- 5. Tabel transaksi detail (Composite Primary Key)
CREATE TABLE IF NOT EXISTS transaksi_detail (
    transaksi_id INT (11) NOT NULL,
    barang_id INT (11) NOT NULL,
    harga INT (11) NOT NULL,
    qty INT (11) NOT NULL,
    PRIMARY KEY (transaksi_id, barang_id),
    FOREIGN KEY (transaksi_id) REFERENCES transaksi (id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (barang_id) REFERENCES barang (id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- 6. Tabel pembayaran
CREATE TABLE IF NOT EXISTS pembayaran (
    id INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    waktu_bayar DATETIME NOT NULL,
    total INT (11) NOT NULL,
    metode ENUM('TUNAI', 'TRANSFER', 'EDC') NOT NULL,
    transaksi_id INT(11),
    FOREIGN KEY (transaksi_id) REFERENCES transaksi (id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- 7. Tabel user
CREATE TABLE IF NOT EXISTS user (
    id_user TINYINT (2) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(35) NOT NULL,
    nama VARCHAR(50) NOT NULL,
    alamat VARCHAR(150),
    hp VARCHAR(20),
    level TINYINT (1) NOT NULL
);

-- DML INSERT DATA

-- 1. Insert Data Pelanggan (10 Data)
INSERT INTO pelanggan (id, nama, jenis_kelamin, telp, alamat) VALUES
('PLG001', 'Ahmad Dahlan', 'L', '081234567890', 'Surabaya'),
('PLG002', 'Siti Nurhaliza', 'P', '081234567891', 'Sidoarjo'),
('PLG003', 'Budi Santoso', 'L', '081234567892', 'Gresik'),
('PLG004', 'Dewi Sartika', 'P', '081234567893', 'Malang'),
('PLG005', 'Eko Prasetyo', 'L', '081234567894', 'Bangkalan'),
('PLG006', 'Fitriani', 'P', '081234567895', 'Mojokerto'),
('PLG007', 'Giri Susanto', 'L', '081234567896', 'Lamongan'),
('PLG008', 'Hany Handayani', 'P', '081234567897', 'Pasuruan'),
('PLG009', 'Irfan Bachdim', 'L', '081234567898', 'Kediri'),
('PLG010', 'Julia Perez', 'P', '081234567899', 'Jombang');

-- 2. Insert Data Supplier (10 Data)
INSERT INTO supplier (nama, telp, alamat) VALUES
('PT. Maju Bersama', '08123456', 'Surabaya'),
('PT. Senang Sekali', '081515563', 'Bangkalan'),
('PT. Segar Segar', '0845454663', 'Surabaya'),
('CV. Sumber Makmur', '0819876543', 'Sidoarjo'),
('PT. Jaya Abadi', '0821234567', 'Malang'),
('CV. Tirta Agung', '0831122334', 'Gresik'),
('PT. Nusantara Indah', '0852345678', 'Jakarta'),
('CV. Sentosa Raya', '0878901234', 'Bandung'),
('PT. Megah Pratama', '0881234567', 'Semarang'),
('CV. Bintang Selatan', '0899876543', 'Yogyakarta');

-- 3. Insert Data Barang (10 Data)
INSERT INTO barang (kode_barang, nama_barang, harga, stok, supplier_id) VALUES
('BRG01', 'Kopi Kapal Api', 3000, 100, 1),
('BRG02', 'Teh Botol Sosro', 4000, 80, 1),
('BRG03', 'Indomie Goreng', 3000, 200, 2),
('BRG04', 'Air Mineral 600ml', 3500, 150, 3),
('BRG05', 'Susu Ultra Milk', 6000, 60, 4),
('BRG06', 'Roti Tawar', 12000, 40, 5),
('BRG07', 'Minyak Goreng 1L', 18000, 50, 6),
('BRG08', 'Gula Pasir 1kg', 14000, 70, 7),
('BRG09', 'Beras 5kg', 65000, 30, 8),
('BRG10', 'Sabun Mandi', 4500, 120, 9);

-- 4. Insert Data Transaksi (10 Data)
INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id) VALUES
('2026-10-01', 'Lunas', 10000, 'PLG001'),
('2026-10-02', 'Lunas', 12000, 'PLG002'),
('2026-10-03', 'Lunas', 18000, 'PLG003'),
('2026-10-04', 'Lunas', 14000, 'PLG004'),
('2026-10-05', 'Lunas', 65000, 'PLG005'),
('2026-10-06', 'Lunas', 9000, 'PLG006'),
('2026-10-07', 'Lunas', 15000, 'PLG007'),
('2026-10-08', 'Lunas', 24000, 'PLG008'),
('2026-10-09', 'Lunas', 36000, 'PLG009'),
('2026-10-10', 'Lunas', 7000, 'PLG010');

-- 5. Insert Data Transaksi Detail (10 Data)
INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty) VALUES
(1, 1, 3000, 2),
(1, 2, 4000, 1),
(2, 3, 3000, 4),
(3, 7, 18000, 1),
(4, 8, 14000, 1),
(5, 9, 65000, 1),
(6, 1, 3000, 3),
(7, 4, 3500, 2),
(8, 6, 12000, 2),
(9, 5, 6000, 6);

-- 6. Insert Data Pembayaran (10 Data)
INSERT INTO pembayaran (waktu_bayar, total, metode, transaksi_id) VALUES
('2026-10-01 10:00:00', 10000, 'TUNAI', 1),
('2026-10-02 11:30:00', 12000, 'TRANSFER', 2),
('2026-10-03 12:15:00', 18000, 'EDC', 3),
('2026-10-04 14:00:00', 14000, 'TUNAI', 4),
('2026-10-05 15:20:00', 65000, 'TRANSFER', 5),
('2026-10-06 09:10:00', 9000, 'TUNAI', 6),
('2026-10-07 16:45:00', 15000, 'EDC', 7),
('2026-10-08 18:00:00', 24000, 'TUNAI', 8),
('2026-10-09 19:30:00', 36000, 'TRANSFER', 9),
('2026-10-10 20:10:00', 7000, 'TUNAI', 10);

-- 7. Insert Data User (10 Data)
INSERT INTO user (username, password, nama, alamat, hp, level) VALUES
('admin1', 'e10adc3949ba59abbe56e057f20f883e', 'Admin Utama', 'Surabaya', '0811111111', 1),
('kasir1', 'e10adc3949ba59abbe56e057f20f883e', 'Budi Kasir', 'Sidoarjo', '0822222222', 2),
('kasir2', 'e10adc3949ba59abbe56e057f20f883e', 'Siti Kasir', 'Gresik', '0833333333', 2),
('manager1', 'e10adc3949ba59abbe56e057f20f883e', 'Rian Manager', 'Malang', '0844444444', 1),
('gudang1', 'e10adc3949ba59abbe56e057f20f883e', 'Dedi Gudang', 'Surabaya', '0855555555', 3),
('gudang2', 'e10adc3949ba59abbe56e057f20f883e', 'Ani Gudang', 'Mojokerto', '0866666666', 3),
('kasir3', 'e10adc3949ba59abbe56e057f20f883e', 'Roni Kasir', 'Bangkalan', '0877777777', 2),
('admin2', 'e10adc3949ba59abbe56e057f20f883e', 'Dewi Admin', 'Sidoarjo', '0888888888', 1),
('supervisor', 'e10adc3949ba59abbe56e057f20f883e', 'Hadi SPV', 'Surabaya', '0899999999', 1),
('gudang3', 'e10adc3949ba59abbe56e057f20f883e', 'Tono Gudang', 'Gresik', '0800000000', 3);
